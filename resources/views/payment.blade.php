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

    <table class="table table-striped mt-4">
        @csrf
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Nominal</th>
                <th>Periode</th>
                <th>Total tagihan tersisa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->member->categori->nominal }}</td>
                <td>{{ $u->member->categori->priod }}</td>
                <td>{{ $u->total_tagihan }}</td>
                <td>
                    <a href="{{ route('payment-detail', $u->id) }}" class="btn btn-primary">Lihat Histori</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
