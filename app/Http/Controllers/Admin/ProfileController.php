<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $me = Auth::guard('petugas')->user();
        return view('admin.profile', compact('me'));
    }

    public function update(Request $request){
        $data = Admin::where('id_petugas', Auth::guard('petugas')->user()->id_petugas)->first();
        $validate = $request->validate([
            'nama_petugas' => 'required',
            'username' => ['required','unique:masyarakat,username',Rule::unique('petugas','username')->ignore($data->id_petugas, 'id_petugas')],
            'telp' => ['required','unique:masyarakat,telp',Rule::unique('petugas','telp')->ignore($data->id_petugas, 'id_petugas')]
        ]);
        $data->update($validate);
        return redirect()->route('admin.my-profile')->with('success', 'Berhasil update profil');
    }

    public function updatePassword(Request $request){
        $data = Auth::guard('petugas')->user();
        $validate = $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'same:new_password']
        ]);

        $data->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->route('admin.my-profile')->with('success', 'Berhasil update password');
    }
}
