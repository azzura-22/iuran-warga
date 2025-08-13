@extends('templet')
@section('content')
<div class="container mt-3">
    <h4>data user</h4>
    <hr>
    @foreach ( $user as $item)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">Username: {{ $item->username }}</p>
            <p class="card-text">Level: {{ $item->level }}</p>
            <p class="card-text">Created at: {{ $item->created_at }}</p>
            <a href="{{route('editmember',Crypt::encrypt($item->id))}}" class="btn btn-primary">Edit</a>
            <a href="{{route('deletemember',Crypt::encrypt($item->id))}}" class="btn btn-danger">Delete</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
