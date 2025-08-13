@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>Register</h1>
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3" style="width: 100%">
                <p>nama</p>
                <input type="text" id="name" name="name" style="width: 100%" required>
            </div>
            <div class="mb-3" style="width: 100% ">
                <p>username</p>
                <input type="text" id="username" name="username" style="width: 100%" required>
            </div>
            <div class="mb-3" style="width: 100%">
                <p>password</p>
                <input type="password" id="password" name="password" style="width: 100%" required>
            </div>
            <div class="mb-3" style="width: 100%">
                <p>no_telpon</p>
                <input type="text" id="no_telepon" name="no_telepon" style="width: 100%">
            </div>
            <div class="mb-3" style="width: 100%">
                <p>alamat</p>
                <input type="text" id="alamat" name="alamat" style="width: 100%" required>
            </div>
            <div class="mb-3" style="width: 100%">
                <p>tanggal lahir</p>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" style="width: 100%" required>
            </div>
            <div class="mb-3" style="width: 100%">
                <p>foto</p>
                <input type="file" id="foto" name="foto" style="width: 100%" accept="image/*">
            </div>
            <div class="mb-3" style="width: 100%">
                <p>categoris</p>
                <select name="categoris_id" id="categoris_id" class="form-select">
                    @foreach ($categoris as $categori)
                        <option value="{{ $categori->id }}">{{ $categori->priod }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3" style="width: 100%">
                <p>level</p>
                <select name="level" id="level" class="form-select">
                    <option value="warga">warga</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <div class="mb-2 d-grid">
                <p>input</p>
                <button type="submit" class="btn btn-primary">Regis</button>
            </div>
        </form>
    </div>
</div>
@endsection
