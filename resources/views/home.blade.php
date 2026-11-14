@extends('layouts.app')


@section('content')
    <h2>Welcome to the Comic Book Catalog</h2>
    <p>Discover and manage your comic book collection with ease.</p>
    <a href="{{ route('comics.index') }}" class="btn btn-primary">Browse All Comics</a>
<div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">{{ $comicCount }}</h3>
                    <p class="card-text text-muted">Total Comics in Archive</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">{{ $genreCount }}</h3>
                    <p class="card-text text-muted">Available Genres</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="d-flex align-items-center gap-3 p-3 border rounded">
        <img src="{{ asset('img/Profile.jpg') }}" width="96" height="96" class="rounded-circle object-fit-cover" alt="Profile Photo">
        <div>
            <h5 class="mb-1">JEFFERSON T. PANTI</h5>
            <p class="mb-0 text-muted">BS Information Technology · 4th Year · Block 4A</p>
        </div>
    </div>
</div>
@endsection
