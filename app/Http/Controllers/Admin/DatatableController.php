<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Models\LogMasyarakat;
use App\Models\MasyarakatTemp;
use App\Http\Controllers\Controller;

class DatatableController extends Controller
{
    public function masyarakatVerif(){
        $data = Masyarakat::get();
        return datatables()->of($data)
        ->editColumn('created_at', function($row){
            return $row->created_at->diffForHumans();
        })
        ->addColumn('action', function($row){
            $nik = $row->nik;
            $output = "<button class='btn btn-primary' type='button' onclick='logActivity(".$nik.")'>Lihat aktivitas</button>";
            return $output;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function masyarakatTemp(){
        $data = MasyarakatTemp::get();
        $verif = Masyarakat::pluck('nik');
        return datatables()->of($data)
        ->addColumn('verif', function($row) use($verif){
            foreach ($verif as $item) {
                if ($item == $row->nik) {
                    return '<span class="badge bg-success rounded-pill">Terdaftar</span>';
                }
            }
        })
        ->addColumn('ttl', function($row){
            $tempat = $row->tempat_lahir;
            $tanggal_lahir = date('d F Y' ,strtotime($row->tanggal_lahir));
            return  $tempat. ', ' . $tanggal_lahir;
        })
        ->rawColumns(['verif'])
        ->make(true);
    }

    public function activityMasyarakat($nik){
        $user = Masyarakat::where('nik', $nik)->first();
        if ($user) {
            $data = LogMasyarakat::where('masyarakat_id', $user->id)->orderBy('created_at', 'DESC')->get();
        }else{
            $data = [];
        }
        $output = datatables()->of($data)
        ->addColumn('time', function($row){
            $time = date('d F Y', strtotime($row->created_at));
            return $row->created_at->diffForHumans() . ' - ' . $time;
        })
        ->make(true);
        return $output;
    }

    public function pengaduanProgres(){
        $data = Pengaduan::with('masyarakat')->where('status', 'proses')->get();
        return datatables()->of($data)
        ->editColumn('tgl_pengaduan', function($row){
            return date('d F Y', strtotime($row->tgl_pengaduan));
        })
        ->addColumn('action', function($row){
            $id = $row->no_pengaduan;
            $output = '<button type="button" onclick="responseAduan(\'' . $id . '\')" class="btn btn-success">Tanggapi Pengaduan</button>';
            return $output;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function pengaduanDone(){
        $data = Pengaduan::with('masyarakat')->where('status', 'selesai')->get();
        return datatables()->of($data)
        ->editColumn('tgl_pengaduan', function($row){
            return date('d F Y', strtotime($row->tgl_pengaduan));
        })
        ->addColumn('action', function($row){
            $id = $row->no_pengaduan;
            $output = '<button type="button" onclick="responseAduan(\'' . $id . '\')" class="btn btn-success">Lihat Tanggapan</button>';
            return $output;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function petugas(){
        $data = Admin::where('level', 'petugas')->get();
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id_petugas;
            $output = '<button type="button" onclick="deleteData(\'' . $id . '\')" class="btn btn-danger">Hapus Petugas</button>';
            return $output;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
