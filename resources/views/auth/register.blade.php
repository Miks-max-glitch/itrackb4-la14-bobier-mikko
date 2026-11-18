@extends('layouts.app')

@section('content')
<h1>Register</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register.store') }}">
    @csrf
    <div class="mb-3">  
        <label for="name">Name</label>
        <input id="name" name="name" value="{{ old('name') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password_confirmation">Confirm password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection