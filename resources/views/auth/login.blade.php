@extends('layouts.app')

@section('content')
<h1>Log in</h1>

@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ route('login.store') }}">
    @csrf
    <div class="mb-3">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Log in</button>
</form>
@endsection