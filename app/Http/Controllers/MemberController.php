<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function login(Request $request){
        $validation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validation)){
            return redirect()->intended('home/warga/');
        }
        return redirect()->back()->with('message','login gagal');
    }
    public function home(){
        return view('home');
    }
}
