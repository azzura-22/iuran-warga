@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>add officer</h1>
        <form action="{{route('store-OFFICER')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3" style="width: 100%">
                <select name="users_id" id="users_id" class="form-select">
                    @foreach ( $users as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
@endsection
