<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\LogMasyarakatController;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)->count();
        return view('masyarakat.pengaduan.index', compact('pengaduan'));
    }

    public function getPengaduan(){
        $data = Pengaduan::where('nik', Auth::user()->nik)->orderBy('status', 'desc')->get();
        return datatables()->of($data)
        ->editColumn('foto', function($row){
            $foto = asset("storage/pengaduan/{$row->foto}");
            $output = '<img class="rounded" style="width:70%; height:100px;" src="'.$foto.'">';
            return $output;
        })
        ->editColumn('tgl_pengaduan', function($row){
            $output = date('d F Y' ,strtotime($row->tgl_pengaduan));
            return $output;
        })
        ->editColumn('status', function($row){
            if ($row->status == 'proses') {
                return '<span class="badge bg-warning">Sedang diproses</span>';
            }else{
                return '<span class="badge bg-success">Selesai</span>';
            }
        })
        ->addColumn('action', function($row){
            $id = $row->no_pengaduan;
            if ($row->status == 'selesai') {
                $output = '<button type="button" onclick="responseAduan(\'' . $id . '\')" class="btn btn-sm btn-success">Lihat Tanggapan</button>';
            }else{
                $output = '<button type="button" onclick="deleteAduan(\'' . $id . '\')" class="btn btn-sm btn-danger">Hapus Pengaduan</button>';
            }
            return $output;

        })
        ->rawColumns(['foto', 'status', 'action'])
        ->make(true);
    }

    public function create(){
        return view('masyarakat.pengaduan.create');
    }

    public function store(Request $request){
        $request->validate([
            'isi_laporan' => 'required',
            'gambar' => 'required|mimes:png,jpg'
        ]);
        $code = $this->pengaduanCode();
        if ($request->hasFile('gambar')) {
            $file_name = time() . '_' . $request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('storage/pengaduan'), $file_name);
            Pengaduan::insert([
                'no_pengaduan' => $code,
                'nik' => Auth::user()->nik,
                'tgl_pengaduan' => Carbon::now(),
                'isi_laporan' => $request->isi_laporan,
                'foto' => $file_name
            ]);
            $log = new LogMasyarakatController();
            $activity = 'Membuat pengaduan';
            $log->activity($activity);

            return redirect()->route('masyarakat.pengaduan.index')->with('success' , 'Berhasil mengupload pengaduan');
        }
    }

    public function tanggapanDetail($no_pengaduan){
        $data = Pengaduan::with('masyarakat')->where('no_pengaduan', $no_pengaduan)->firstOrFail();
        if ($data->status == 'selesai') {
            $tanggapan = Tanggapan::with('petugas')->where('id_pengaduan', $data->id_pengaduan)->first();
            return view('masyarakat.tanggapan.detail', compact('data', 'tanggapan'));
        }else{
            abort(404);
        }
    }

    public function destroy($no_pengaduan){
        $data = Pengaduan::where('no_pengaduan', $no_pengaduan)->where('nik', Auth::user()->nik)->first();
        if ($data) {
            if ($data->status == 'proses') {
                $path = public_path("storage/pengaduan/{$data->foto}");
                if (File::exists($path)) {
                    File::delete($path);
                }
                $data->delete();
                $log = new LogMasyarakatController();
                $activity = 'Menghapus pengaduan';
                $log->activity($activity);
                return [
                    'statusCode' => 200,
                    'message' => 'Pengaduan berhasil dihapus'
                ];
            }else{
                return [
                    'statusCode' => 422,
                    'message' => 'Pengaduan tidak bisa dihapus karna telah ditanggapi'
                ];
            }
            }else{
                return [
                    'statusCode' => 404,
                    'message' => 'Data pengaduan tidak ditemukan'
                ];
        }
    }

    protected function pengaduanCode(){
        $str = Str::random(20);
        $data = Pengaduan::where('no_pengaduan', $str)->first();
        if ($data) {
            return $this->pengaduanCode();
        }
        return $str;
    }
}
