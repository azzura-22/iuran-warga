@extends('templet')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="container-flex justify-content-center align-items-center p-4 border border-dark" style="width: 420px">
        <h1>Add Payment</h1>
        <form action="{{ route('addpayment') }}" method="POST">
            @csrf
            <select name="user_id" class="form-select mb-3">
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option id="idselect" value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @php
                $seleted = 'user_id';
            @endphp
            @if ($selected)
            @endif
        </form>
    </div>
</div>
@endsection
