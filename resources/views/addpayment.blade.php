@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>Add Payment</h1>
        <form action="{{ route('addpy') }}" method="POST">
            @csrf
            <select name="id_users" class="form-select mb-3">
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
                <input type="text" name="nominal" class="form-control mb-3" placeholder="Nominal" required>
            <button type="submit" class="btn btn-primary">add</button>
        </form>
    </div>
</div>
@endsection
