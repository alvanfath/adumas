<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Models\MasyarakatTemp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogMasyarakatController;

class AuthUserController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function storeRegister(Request $request){
        $request->validate([
            'nik' => 'required|max:16|unique:masyarakat,nik|digits:16',
            'username' => 'required|unique:masyarakat,username|unique:petugas,username',
            'password' => 'required',
            'telp' => 'required|unique:masyarakat,telp|unique:petugas,telp|digits_between:8,13',
        ]);
        // try {
            $masyarakat = MasyarakatTemp::where('nik', $request->nik)->first();
            if ($masyarakat) {
                $data = Masyarakat::create([
                    'nik' => $masyarakat->nik,
                    'nama' => $masyarakat->nama,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'telp' => $request->telp,
                    'jenis_kelamin' => $masyarakat->jenis_kelamin,
                    'tempat_lahir' => $masyarakat->tempat_lahir,
                    'tanggal_lahir' => $masyarakat->tanggal_lahir,
                    'alamat' => $masyarakat->alamat,
                    'agama' => $masyarakat->agama,
                    'status_perkawinan' => $masyarakat->status_perkawinan,
                    'pekerjaan' => $masyarakat->pekerjaan,
                    'created_at' => now()
                ]);

                Auth::login($data);
                $log = new LogMasyarakatController();
                $activity = 'Registrasi';
                $log->activity($activity);
                return redirect()->route('masyarakat.dashboard')->with('success', 'Registrasi Berhasil');
            }
            return redirect()->back()->withErrors([
                'nik' => 'NIK tidak terdaftar di desa Cipinanggading'
            ])->onlyInput('nik','username','telp');
        // } catch (\Throwable $th) {
        //     return back()->with('error', 'Ada masalah teknis silakan coba beberapa saat lagi');
        // }
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $log = new LogMasyarakatController();
            $activity = 'Login';
            $log->activity($activity);
            return redirect()->route('masyarakat.dashboard');
        }

        return back()->withErrors([
            'username' => 'Autentikasi gagal.',
        ])->onlyInput('username');
    }

    public function logout(){
        $log = new LogMasyarakatController();
        $activity = 'Logout';
        $log->activity($activity);
        Auth::logout();
        return redirect()->route('login');
    }
}
