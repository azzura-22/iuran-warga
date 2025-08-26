@extends('templet')
@section('content')
<div class="container mt-3">
    <h4>Data Officer</h4>
    <a href="{{route('createofficer')}}" class="btn btn-primary">Add</a>
    <hr>
    @foreach ($officer as $item)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $item->user->name }}</h5>
            <p class="card-text">Username: {{ $item->user->username }}</p>
            <p class="card-text">Created at: {{ $item->created_at }}</p>
            {{-- <a href="{{ route('editofficer', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Edit</a> --}}
            <a href="{{ route('deleteofficer', Crypt::encrypt($item->id)) }}" class="btn btn-danger" onclick="return confirm('Delete this data')">Delete</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
