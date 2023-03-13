<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $register = route('register');
        $step_register = [
            'Pastikan nik anda terdaftar di desa cipinanggading.',
            'Registrasi ke halaman <a href="'.$register.'">Register</a>.',
            'Registrasi dengan mengisi Nik, Username, Password, dan Nomor telepon aktif.',
            'Anda berhasil registrasi.'
        ];

        $step_pengaduan = [
            'Login menggunakan username dan password terdaftar.',
            'Masuk ke halaman buat pengaduan.',
            'isi pengaduan dengan mengisi deskripsi dan bukti foto.',
            'Pengaduanmu berhasil dibuat.',
            'klik simpan lalu tunggu sampai pengaduan di tanggapi oleh petugas.'
        ];
        return view('landing', compact('step_register', 'step_pengaduan'));
    }
}
