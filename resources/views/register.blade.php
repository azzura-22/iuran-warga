@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    @csrf
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>Register</h1>
        <form action="{{route('register')}}" method="POST">
            <div class="mb-3" style="width: 100%">
                <p>nama</p>
                <input type="text" id="name" name="name" style="width: 100%">
            </div>
            <div class="mb-3" style="width: 100% ">
                <p>username</p>
                <input type="text" id="username" name="username" style="width: 100%">
            </div>
            <div class="mb-3" style="width: 100%">
                <p>password</p>
                <input type="number" id="password" name="password" style="width: 100%">
            </div>
            <div class="mb-2 d-grid">
                <p>input</p>
                <button type="submit" class="btn btn-primary">Regis</button>
            </div>
        </form>
    </div>
</div>
@endsection
