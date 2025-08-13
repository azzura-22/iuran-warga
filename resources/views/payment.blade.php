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
                <th>Id</th>
                <th>User</th>
                <th>Nominal</th>
                <th>Periode</th>
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td>{{ $item->priod }}</td>
                    <td>
                        @if($item->status == '1')
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-danger">Unpaid</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>
                        <select name="status">
                            <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Unpaid</option>
                            <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Paid</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
