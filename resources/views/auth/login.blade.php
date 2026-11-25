@extends('layouts.app')

@section('content')
<h2>Log in</h2>

<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input name="password" type="password" class="form-control">
    </div>

    <button class="btn btn-primary">Log in</button>
</form>
@endsection