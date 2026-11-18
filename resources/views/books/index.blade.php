@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">+ Add Book</a>

    <form method="GET" action="{{ route('books.index') }}" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="text" name="q" value="{{ request('q') }}"
                   class="form-control" placeholder="Search by title...">
        </div>

        <div class="col-md-2">
            <select name="genre_id" class="form-select">
                <option value="">All genres</option>
                @foreach ($genres as $g)
                    <option value="{{ $g->id }}"
                        @selected(request('genre_id') == $g->id)>{{ $g->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="featured" class="form-select">
                <option value="">Any</option>
                <option value="1" @selected(request('featured') === '1')>Featured</option>
                <option value="0" @selected(request('featured') === '0')>Not featured</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="title"  @selected(request('sort', 'title') === 'title')>Sort: Title</option>
                <option value="author" @selected(request('sort') === 'author')>Sort: Author</option>
                <option value="year"   @selected(request('sort') === 'year')>Sort: Year</option>
            </select>
        </div>

        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-primary">Apply</button>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Clear</a>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show', ['book' => $book['id']]) }}">
                            {{ $loop->iteration }}
                        </a>
                    </td>
                    <td>
                        {{ $book['title'] }}
                        @if (!empty($book['is_featured']))
                            <span class="badge bg-warning text-dark">Featured</span>
                        @endif
                    </td>
                    <td>{{ $book['author'] }}</td>
                    <td>
                        {{ $book['year'] }}
                        @if ($book['year'] >= 2000)
                            <span class="badge bg-primary">Classic</span>
                        @else
                            <span class="badge bg-primary">Oldies</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.index', ['genre_id' => $book['genre_id']]) }}">
                            {{ $book->genre->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Books Available</td> 
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}

    <p>Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>

@endsection