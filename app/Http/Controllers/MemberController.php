<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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
        if (Auth::user()->level === 'warga') {
            return redirect()->route('homewarga')->with('message', 'Login successful');
        } elseif (Auth::user()->level === 'admin') {
            return redirect()->route('dsb')->with('message', 'Login successful');
        }
        return redirect()->route('dsb');
    }

    return back()->with('message', 'Login gagal');
    }

    public function home(){
        return view('home');
    }
    public function regis(){
        $data['user'] = User::all();
        return view('register', $data);
    }
    public function register(Request $request){
    $validate = $request->validate([
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
        'level' => 'required',
        'no_telepon' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required|date',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'categoris_id' => 'required|exists:categoris,id',
    ]);
    if ($request->hasFile('foto')){
        $foto = $request->file('foto');
        $filename = time() .'-'.$request->name.'.'.$foto->getClientOriginalExtension();
        $foto->storeAs('images', $filename, 'public');
    }
    else {
        $filename = "_";
    }

    $validate['password'] = bcrypt($validate['password']);

    $user = User::create([
        'name' => $validate['name'],
        'username' => $validate['username'],
        'password' => $validate['password'],
        'level' => $validate['level'],
        'no_telepon' => $validate['no_telepon'],
    ]);
    member::create([
        'users_id' => $user->id,
        'name' => $validate['name'],
        'no_telepon' => $validate['no_telepon'],
        'alamat' => $validate['alamat'],
        'tanggal_lahir' => $validate['tanggal_lahir'],
        'categoris_id' => $validate['categoris_id'],
        'foto' => $filename,
    ]);
    return redirect()->route('dsb')->with('message', 'Registration successful, please login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function dataMember(){
        $data['user'] = User::all();
        return view('datamember', $data);
    }
    public function edit(Request $request,string $id)
    {
        try{
            $id = Crypt::decrypt($id);
        }catch(DecryptException $e){
            return redirect()->back();
        };

        $data['member'] = Auth::user()->member;
        $data['user'] = User::find($id);
        return view('editmember', $data);
    }
    public function delete(Request $request, string $id)
    {
        try{
            $id = Crypt::decrypt($id);
        }catch(DecryptException $e){
            return redirect()->back();
        };

        User::destroy($id);
        member::where('users_id', $id)->delete();
        return redirect()->route('datamember')->with('message', 'User deleted successfully');
    }
    public function update(Request $request, string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('message', 'User not found');
        }

        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_telepon' => 'required',
            'level' => 'required',
        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user->update($validate);

        return redirect()->route('datamember')->with('message', 'User updated successfully');
    }
    public function warga(){
        $data['member'] = Auth::user()->member;
        return view('warga.homewarga',$data);
    }

    public function profile(Request $request,string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $data['member'] = member::find($id);

        return view('warga.editmember',$data);
    }
    public function updateProfile(Request $request, string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $member = member::find($id);
        if (!$member) {
            return redirect()->back()->with('message', 'Member not found');
        }

        $validate = $request->validate([
            'name' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = $member->foto;

        if ($request->hasFile('foto')){
            if (Storage::exists('images/'.$member->foto)){
                Storage::delete('images/'.$member->foto);
            }
            $foto = $request->file('foto');
            $filename = time() .'-'.$request->name.'.'.$foto->getClientOriginalExtension();
            $foto->storeAs('images', $filename, 'public');
        }

        $member->update([
            'name' => $validate['name'],
            'no_telepon' => $validate['no_telepon'],
            'alamat' => $validate['alamat'],
            'tanggal_lahir' => $validate['tanggal_lahir'],
            'foto' => $filename,
        ]);

        return redirect()->route('homewarga')->with('message', 'Profile updated successfully');
    }
}
