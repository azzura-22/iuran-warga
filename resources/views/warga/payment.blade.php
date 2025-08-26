@extends('warga.template')
@section('content')
<div class="container">
    <h2>history payment</h2>
    <div class="container">
        <h4>sisa tagihan : {{$total_tagihan}}</h4>
        <table class="table table-striped mt-4">
            @csrf
            <thead>
                <tr>
                    <th>Nominal</th>
                    <th>Periode</th>
                    <th>Pembayara Ke-</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payment as $item)
                <tr>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
