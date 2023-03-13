<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldUserPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogMasyarakatController;

class ProfileUserController extends Controller
{
    public function index(){
        $me = Auth::user();
        return view('masyarakat.profile',compact('me'));
    }

    public function update(Request $request){
        $data = Auth::user();
        $validate = $request->validate([
            'username' => 'required|unique:petugas,username|unique:masyarakat,username,'.$data->id,
            'telp' =>  'required|numeric|digits_between:8,13|unique:petugas,telp|unique:masyarakat,telp,'.$data->id,
        ]);
        $data->update($validate);
        $log = new LogMasyarakatController();
        $activity = 'Mengubah profile';
        $log->activity($activity);
        return redirect()->route('masyarakat.my-profile')->with('success', 'Update profil berhasil');
    }

    public function updatePassword(Request $request){
        $data = Auth::user();
        $validate = $request->validate([
            'current_password' => ['required', new MatchOldUserPassword],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'same:new_password']
        ]);

        $data->update([
            'password' => Hash::make($request->new_password)
        ]);
        $log = new LogMasyarakatController();
        $activity = 'Mengubah password';
        $log->activity($activity);
        return redirect()->route('masyarakat.my-profile')->with('success', 'Password berhasil diubah');
    }
}
