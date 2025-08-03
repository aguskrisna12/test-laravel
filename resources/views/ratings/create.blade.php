@extends('layouts.app')

@section('content')
    <h2>Input rating</h2>
    
    <div style="margin-bottom: 30px;">
        <ul style="list-style-type: disc; margin-left: 20px;">
            <li>Every input here is a drop down input</li>
            <li>Please make sure, the book name input here is created by those author</li>
            <li>The rating is number increment by 1, from the lowest is 1 to 10</li>
            <li>After submit success, please go back to first page ( list of book )</li>
        </ul>
    </div>
    
    <div style="background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h3 style="text-align: center; margin-bottom: 30px;">Insert Rating</h3>
        
        <form method="POST" action="{{ route('ratings.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="author_id">Book Author:</label>
                <select name="author_id" id="author_id" required>
                    <option value="">Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="book_id">Book Name:</label>
                <select name="book_id" id="book_id" required disabled>
                    <option value="">Select Book</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating" required>
                    <option value="">Select Rating</option>
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            
            <div style="text-align: center;">
                <button type="submit" class="btn">SUBMIT</button>
            </div>
        </form>
    </div>
    
    <script>
        document.getElementById('author_id').addEventListener('change', function() {
            const authorId = this.value;
            const bookSelect = document.getElementById('book_id');
            
            // Reset book select
            bookSelect.innerHTML = '<option value="">Select Book</option>';
            bookSelect.disabled = true;
            
            if (authorId) {
                // Fetch books for selected author
                fetch(`/books-by-author?author_id=${authorId}`)
                    .then(response => response.json())
                    .then(books => {
                        books.forEach(book => {
                            const option = document.createElement('option');
                            option.value = book.id;
                            option.textContent = book.title;
                            bookSelect.appendChild(option);
                        });
                        bookSelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error fetching books:', error);
                    });
            }
        });
    </script>
@endsection 