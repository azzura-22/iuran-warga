<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $data['payment'] = payment::all();
        return view('payment',$data);
    }

    public function indexi(Request $request)
{
    $search = $request->input('search');

    $payment = Payment::with('user')
        ->when($search, function($query) use ($search) {
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        })
        ->orderBy('id', 'desc')
        ->get();

    return view('payment', compact('payment'));
}

    public function update(Request $request, $id)
    {

        try{
            $id = Crypt::decrypt($id);
        }catch(DecryptException $e){
            return redirect()->back();
        };

        payment::find($id);

        payment::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    public function addpayment(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nominal' => 'required|numeric',
            'priod' => 'required',
        ]);

        payment::create([
            'user_id' => $request->user_id,
            'nominal' => $request->nominal,
            'priod' => $request->priod,
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Payment added successfully.');
    }

    public function addpy(){
        $data['users'] = User::whre('level', 'warga')->get();
        return view('addpayment', $data);
    }
}
