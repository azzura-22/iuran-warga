<link rel="stylesheet" href="{{asset('bootstrap1/css/bootstrap.min.css')}}">
@extends('templet')
@section('content')
<style>
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.2s ease-in-out;
        height: 200px;
    }
    .card:hover {
        transform: translateY(-5px);
    }

    .progress-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: conic-gradient(#3b82f6 var(--percent), #e5e7eb 0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #1e293b;
        font-size: 16px;
    }


    .bg-user { background: #60a5fa; }
    .bg-payment { background: #fbbf24; }
    .bg-member { background: #a78bfa; }
    .bg-category { background: #34d399; }
</style>

<div class="container mt-4">
    <h3 class="fw-bold mb-3">Dashboard</h3>
    <hr>
    @csrf
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <a href="/data/member" class="text-decoration-none">
                <div class="card bg-user text-white p-3">
                    <div class="d-flex flex-column h-100 justify-content-between">
                        <i class="fa-solid fa-users fa-3x"></i>
                        <div class="text-end">
                            <h6 class="mb-1">User</h6>
                            <h5>120 Warga</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-6 col-lg-3">
            <div class="card bg-payment text-dark p-3 text-center">
                <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                    <div class="progress-circle mb-2" style="--percent:75%;">75%</div>
                    <h6 class="fw-bold">Data Pembayaran</h6>
                    <p class="mb-0">Saldo: Rp 7jt / 10jt</p>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-3">
            <a href="/register" class="text-decoration-none">
                <div class="card bg-member text-white p-3">
                    <div class="d-flex flex-column h-100 justify-content-between">
                        <i class="fa-solid fa-address-book fa-3x"></i>
                        <div class="text-end">
                            <h6 class="mb-1">Create Member</h6>
                            <h5>Tambah Baru</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-6 col-lg-3">
            <a href="{{route('data')}}" class="text-decoration-none">
                <div class="card bg-category text-white p-3">
                    <div class="d-flex flex-column h-100 justify-content-between">
                        <i class="fa-solid fa-tags fa-3x"></i>
                        <div class="text-end">
                            <h6 class="mb-1">Category</h6>
                            <h5>Kelola Data</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
