@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>add Category</h1>
        <form action="{{route('storecategory')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3" style="width: 100%">
                <p>priode</p>
                <input type="text" id="priod" name="priod" style="width: 100%" required>
            </div>
            <div class="mb-3" style="width: 100% ">
                <p>nominal</p>
                <input type="integer" id="nominal" name="nominal" style="width: 100%" required>
            </div>
            <div class="mb-2 d-grid">
                <p>input</p>
                <button type="submit" class="btn btn-primary">Regis</button>
            </div>
        </form>
    </div>
</div>
@endsection
