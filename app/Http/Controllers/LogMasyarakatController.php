<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogMasyarakat;
use Illuminate\Support\Facades\Auth;

class LogMasyarakatController extends Controller
{
    public function index(){
        $me = Auth::user();
        $activity = LogMasyarakat::where('masyarakat_id', $me->id)->orderBy('created_at', 'DESC')->get();
        return view('masyarakat.log', compact('me','activity')); 
    }
    public function activity($activity){
        LogMasyarakat::insert([
            'masyarakat_id' => Auth::user()->id,
            'activity' => $activity,
            'created_at' => now()
        ]);
    }
}
