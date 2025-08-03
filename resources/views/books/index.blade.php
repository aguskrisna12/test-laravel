@extends('layouts.app')

@section('content')
    <h2>List of Books with Filter</h2>
    
    <div class="filters">
        <form method="GET" action="{{ route('books.index') }}">
            <div class="form-group">
                <label for="per_page">List Show:</label>
                <select name="per_page" id="per_page">
                    @foreach([10, 20, 30, 40, 50, 60, 70, 80, 90, 100] as $option)
                        <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="search">Search:</label>
                <input type="text" name="search" id="search" value="{{ $search }}" placeholder="Search by book name or author name">
            </div>
            
            <button type="submit" class="btn">SUBMIT</button>
        </form>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
                <tr>
                    <td>{{ $books->firstItem() + $index }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ number_format($book->average_rating, 2) }}</td>
                    <td>{{ $book->voter_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="pagination">
        {{ $books->appends(request()->query())->links() }}
    </div>
@endsection 