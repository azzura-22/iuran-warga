@extends('warga.template')
@section('content')
<div class="container d-flex mt-3 justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex mt-3 justify-content-center align-items-center">
        <h4>Edit member</h4>
        <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
            <form action="{{route('updatememberprofile',Crypt::encrypt($member->id))}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3" style="width: 100%">
                    <p>nama</p>
                    <input type="text" id="name" name="name" value="{{$member->name}}" style="width: 100%" required>
                </div>
                <div class="mb-3" style="width: 100%">
                    <p>password</p>
                    <input type="password" id="password" name="password" style="width: 100%">
                </div>
                <div class="mb-3" style="width: 100%">
                    <p>no_telpon</p>
                    <input type="text" id="no_telepon" name="no_telepon" value="{{$member->no_telepon}}" style="width: 100%">
                </div>
                <div class="mb-3" style="width: 100%">
                    <p>alamat</p>
                    <input type="text" id="alamat" name="alamat" value="{{$member->alamat}}" style="width: 100%" required>
                </div>
                <div class="mb-3" style="width: 100%">
                    <p>tanggal lahir</p>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{$member->tanggal_lahir}}" style="width: 100%" required>
                </div>
                <div class="mb-3" style="width: 100%">
                    <p>foto</p>
                    <input type="file" id="foto" name="foto" style="width: 100%" accept="image/*">
                </div>
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
