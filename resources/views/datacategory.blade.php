@extends('templet')
@section('content')
<div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Category Tagihan</h4>
        <a href="{{route('category')}}" class="btn btn-primary">Create</a>
    </div>
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
            <th>Harga</th>
            <th>Periode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categoris as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>Rp. {{ $item->nominal }}</td>
            <td>{{ $item->periode }}</td>
            <td>
               <a href="{{ route('editcategory',Crypt::encrypt($item->id)) }}"class="btn btn-info">Edit</a>
                <a href="{{route('deletecategory',Crypt::encrypt($item->id))}}"class="btn btn-danger" onclick="return  confirm('Delete this data')">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
