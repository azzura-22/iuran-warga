<?php

namespace App\Http\Controllers;

use App\Models\categori;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoriController extends Controller
{
    //
    public function index()
    {
        $data['categoris'] = categori::all();
        return view('category',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'priod' => 'required|string|max:255',
            'nominal' => 'required|integer',
        ]);

        categori::create([
            'priod' => $request->priod,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('data')->with('success', 'Category created successfully.');
    }
    public function view(){
        $data['categoris'] = categori::all();
        return view('datacategory',$data);
    }
    public function delete(string $id){

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $categori = categori::destroy($id);
        return redirect()->route('data')->with('success', 'Category deleted successfully.');
    }
    public function edit( Request $request,string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        categori::find($id);

        $validate = $request->validate([
            'priod' => 'required|string|max:255',
            'nominal' => 'required|integer',
        ]);

        categori::where('id', $id)->update($validate);

        return redirect()->route('data')->with('success', 'Category updated successfully.');
    }
    public function editView(string $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $data['categori'] = categori::find($id);
        return view('editcategory', $data);
    }
}
