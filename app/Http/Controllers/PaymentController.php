<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\member;
use App\Models\payment;
use App\Models\User;
use DateTime;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    //
    public function index(){
        $data['member'] = member::orderBy('id', 'desc')->get();
        $data['user'] = User::with('member.categori')->whereHas('member')->orderBy('id', 'desc')->get();
        foreach($data['user'] as $u){
            $tanggalAwal = new DateTime("2025-01-01");
            $tanggalAkhir = new DateTime(date("Y-m-d"));
            $selisih = $tanggalAwal->diff($tanggalAkhir);

            $totalBulan = ($selisih->y * 12) + $selisih->m;

            $totalPaid = payment::where('users_id', $u->id)->where('status', '1')->count();
            $u->total_tagihan = $totalBulan - $totalPaid;
        }
        return view('payment', $data);
    }

    public function detail(Request $request)
    {
        $data['payment'] = payment::where('users_id', $request->id)->get();

        $tanggalAwal = new DateTime("2025-01-01");
        $tanggalAkhir = new DateTime(date("Y-m-d"));
        $selisih = $tanggalAwal->diff($tanggalAkhir);

        $totalBulan = ($selisih->y * 12) + $selisih->m;

        $totalPaid = payment::where('users_id', $request->id)->where('status', '1')->count();
        $data['total_tagihan'] = $totalBulan - $totalPaid;

        return view('payment_detail', $data);
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
            'status' => '0',
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
        $data['users'] = User::all();
        return view('addpayment', $data);
    }
    public function py(Request $request)
    {
        $request->validate([
            'id_users' => 'required|exists:users,id',
            'nominal' => 'required|numeric',
        ]);

        $py = User::with('member.categori')->find($request->id_users);
        if (!$py || !$py->member || !$py->member->categori) {
            return redirect()->back()->with('message', 'User not found');
        }

        $pay = $py->member->categori;

        $nominal = $request->nominal / $pay->nominal;

        

        for ($i = 0; $i < $nominal; $i++) {
            payment::create([
                'users_id' => $py->id,
                'priod' => $pay->priod,
                'nominal' => $pay->nominal,
                'status' => '1',
            ]);
        }

        return redirect()->route('payment')->with('success', 'Payment added successfully.');
    }
}
