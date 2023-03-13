<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $me = Auth::user();
        $pengaduan = Pengaduan::with('masyarakat')->orderBy('tgl_pengaduan', 'DESC')->get();

        return view('masyarakat.dashboard', compact('me', 'pengaduan'));
    }

    public function getPengaduan(){
        $data = Pengaduan::where('nik', Auth::user()->nik)->get();
        return datatables()->of($data)->make(true);
    }


}
