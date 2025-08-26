@extends('templet')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Payment</h4>
        <form action="{{ route('searchpayment') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari nama user..."
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <a href="{{ route('addpayment') }}" class="btn btn-success mb-3">Tambah Payment</a>
    <hr>

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session('success') }}
        </div>
    @endif
    Tagihan yang harus dibayar: {{$total_tagihan}} <br>
    <table class="table table-striped mt-4">
        @csrf
        <thead>
            <tr>
                <th>User</th>
                <th>Nominal</th>
                <th>Periode</th>
                <th>Pembayara Ke-</th>
                <th>Status</th>
                <th>Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payment as $item)
            <form action="{{ route('updatepayment', Crypt::encrypt($item->id)) }}" method="POST">
                @csrf
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td>{{ $item->priod }}</td>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($item->status == '1')
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-danger">Unpaid</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return  confirm('Cencel this payment')">Cancel</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
