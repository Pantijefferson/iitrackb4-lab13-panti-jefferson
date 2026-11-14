@extends('layouts.app')

@section('title', 'Comic Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>

    <!-- Add Comic Button -->
    <div class="mb-3">
        <a href="{{ route('comics.create') }}" class="btn btn-primary">
            Add Comic
        </a>
    </div>

    <!-- Success Message Alert -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Part H & I: Search, Filter & Sort Form -->
    <form method="GET" action="{{ route('comics.index') }}" class="row g-2 mb-4">
        <!-- Text Search -->
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search title..." value="{{ request('search') }}">
        </div>

        <!-- Lookup Table Dropdown (Genre) -->
        <div class="col-md-3">
            <select name="genre_id" class="form-select">
                <option value="">All Genres</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(request('genre_id') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Boolean Filter (Featured) -->
        <div class="col-md-2">
            <select name="is_featured" class="form-select">
                <option value="">Featured: Any</option>
                <option value="1" @selected(request('is_featured') === '1')>Featured Only</option>
                <option value="0" @selected(request('is_featured') === '0')>Not Featured</option>
            </select>
        </div>

        <!-- Sort Control -->
        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="title" @selected(request('sort', 'title') === 'title')>Sort: Title</option>
                <option value="year" @selected(request('sort') === 'year')>Sort: Year</option>
                <option value="price" @selected(request('sort') === 'price')>Sort: Price</option>
            </select>
        </div>

        <!-- Apply & Clear Buttons -->
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">Apply</button>
            <a href="{{ route('comics.index') }}" class="btn btn-outline-secondary">Clear</a>
        </div>
    </form>

    <!-- Comics Table -->
    <table class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Price</th>
                <th style="width: 150px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comics as $comic)
                <tr>
                    <td>
                        <a href="{{ route('comics.show', $comic->id) }}">
                            {{ $comic->title }}
                        </a>
                    </td>
                    <td>{{ $comic->author }}</td>
                    <td>{{ $comic->year }}</td>
                    <td>
                        {{ $comic->genre->name ?? 'N/A' }}
                    </td>
                    <td>${{ number_format($comic->price, 2) }}</td>
                    
                    <!-- ACTIONS COLUMN WITH EDIT BUTTON & DELETE FORM -->
                    <td>
                        <div class="d-flex gap-1">
                            <!-- Edit Button -->
                            <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('comics.destroy', $comic) }}" method="POST" 
                                  onsubmit="return confirm('Delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No Comics Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            @if ($comics->total() > 0)
                <p class="text-muted mb-0">
                    Showing <strong>{{ $comics->firstItem() }}</strong> to <strong>{{ $comics->lastItem() }}</strong> of <strong>{{ $comics->total() }}</strong> results
                </p>
            @endif
        </div>
        <div>
            {{ $comics->links() }}
        </div>
    </div>

    
    <p class="mt-3">Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>

@endsection