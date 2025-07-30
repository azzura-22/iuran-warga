<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
   public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->route('dsb'); // arahkan ke route dashboard
    }

    return back()->with('message', 'Login gagal');
}

    public function home(){
        return view('home');
    }
    public function regis(){
        return view('register');
    }
    public function register(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);

        return redirect()->route('dsb')->with('message', 'Registration successful, please login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
