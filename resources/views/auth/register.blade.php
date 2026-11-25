@extends('layouts.app')

@section('content')
<h2>Register</h2>

<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input name="password" type="password" class="form-control">
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control">
    </div>

    <button class="btn btn-primary">Register</button>
</form>
@endsection