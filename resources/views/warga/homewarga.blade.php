@extends('warga.template')
@section('content')
<div class="container mt-3">
    <h4>profile Member</h4>
    <div class="container-fluid d-flex border border-dark">
        <div class="container p-3">
            <img style="height: 350px; width:350px" src="{{asset('storage/images/'.$member->foto)}}" alt="">
        </div>
        <div class="container p-3">
            <h4>Name: {{ $member->name }}</h4>
            <p>Address: {{ $member->alamat }}</p>
            <p>Phone: {{ $member->no_telepon }}</p>
            <p>Email: {{ $member->tanggal_lahir}}</p>
            <hr>
            <h4>Action</h4>
            <a href="{{route('profilemember',Crypt::encrypt($member->id))}}" class="btn btn-primary">Edit</a>
        </div>
    </div>
    <hr>
    <h4>History payment</h4>
    <div class="card bg bg-success">
        <div class="card-body" style="300px">
            <div class="card-body d-flex align-item-center justify-content-between text-white">
                <i class="fa-solid fa-money-bill" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h6>Payment History</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
