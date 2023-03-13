<?php

namespace App\Http\Controllers\Admin;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogMasController extends Controller
{
    public function index($nik){
        $masyarakat = Masyarakat::where('nik', $nik)->firstOrFail();
        return view('admin.masyarakat.log', compact('nik', 'masyarakat'));
    }
}
