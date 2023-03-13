<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Models\MasyarakatTemp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index(){
        $me = Auth::guard('petugas')->user();
        $total_user = Masyarakat::count();
        $total_pengaduan = Pengaduan::count();
        $tanggap = Pengaduan::where('status', 'selesai')->count();
        $belum_tanggap = Pengaduan::where('status', 'proses')->count();
        $masyarakat = MasyarakatTemp::count();
        return view('admin.dashboard', compact('me', 'total_pengaduan', 'total_user', 'tanggap', 'belum_tanggap', 'masyarakat'));
    }
}
