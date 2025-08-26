<?php

namespace App\Http\Controllers;

use App\Models\officer;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OfficerController extends Controller
{
    //
    public function index(){
        $data['officer'] = officer::with('user')->orderBy('id', 'desc')->get();
        return view('officer', $data);
    }
    public function create(){
        $data['users']= User::where('level', 'admin')->get();
        return view('addofficer', $data);
    }
    public function store(Request $request){
        $validate = $request->validate([
            'users_id' => 'required|exists:users,id',
        ]);
        officer::create([
            'users_id' => $request->users_id,
        ]);
        return redirect()->route('officer')->with('message', 'Officer created successfully');
    }
    public function delete($id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        officer::find($id)->delete();
        return redirect()->route('officer')->with('message', 'Officer deleted successfully');
    }
}
