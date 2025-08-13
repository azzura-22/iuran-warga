<link rel="stylesheet" href="{{asset('bootstrap1/css/bootstrap.min.css')}}">
@extends('templet')
@section('content')
<div class="container mt-3">
    <h4>Dasboard</h4>
    <hr>
    @csrf
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-md-flex gap-3">
        <a href="/data/member" class="text-decoration-none">
            <div class="card bg bg-danger" style="width: 300px">
                <div class="card-body d-flex align-item-center justify-content-between text-white">
                    <i class="fa-solid fa-users" style="font-size:  50px"></i>
                    <div class="item-count text-end">
                        <h6>user</h6>
                    </div>
                </div>
            </div>
        </a>
        <div class="card bg bg-warning" style="width: 300px">
            <div class="card-body d-flex align-item-center justify-content-between text-white">
                <i class="fa-solid fa-money-bill" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h6>payment</h6>
                </div>
            </div>
        </div>
        <a href="/register" style="text-decoration: none;">
            <div class="card bg bg-info" style="width: 300px">
                <div class="card-body d-flex align-item-center justify-content-between text-white">
                    <i class="fa-solid fa-address-book" style="font-size: 50px"></i>
                    <div class="item-count text-end">
                        <h6>create member</h6>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('data')}}" style="text-decoration: none;">
            <div class="card bg bg-success" style="width: 300px">
                <div class="card-body d-flex align-item-center justify-content-between text-white">
                    <i class="fa-solid fa-tags" style="font-size: 50px"></i>
                    <div class="item-count text-end">
                        <h6>category</h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
