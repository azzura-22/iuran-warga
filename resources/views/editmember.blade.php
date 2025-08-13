@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>edit member</h1>
        <form action="{{route('updatemember',Crypt::encrypt($user->id))}}" method="POST">
            @csrf
            <div class="mb-3" style="width: 100%">
                <p>nama</p>
                <input type="text" id="name" name="name" style="width: 100%" value="{{ old('name', $user->name) }}">
            </div>
            <div class="mb-3" style="width: 100% ">
                <p>username</p>
                <input type="text" id="username" name="username" style="width: 100%" value="{{ old('username',$user->username) }}">
            </div>
            <div class="mb-3" style="width: 100%">
                <p>password</p>
                <input type="password" id="password" name="password" style="width: 100%">
            </div>
            <div class="mb-3" style="width: 100%">
                <p>no_telepon</p>
                <input type="text" id="no_telepon" name="no_telepon" style="width: 100%" value="{{$user->member->no_telepon}}">
            </div>
            <div class="mb-3" style="width: 100%">
                <p>level</p>
                <select name="level" id="level" class="form-select">
                    @foreach ( $user as $item)
                    <option value="warga">warga</option>
                    <option value="admin">admin</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2 d-grid">
                <p>input</p>
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </form>
    </div>
</div>
@endsection
