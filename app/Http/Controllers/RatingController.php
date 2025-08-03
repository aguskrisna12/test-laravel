<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create()
    {
        $authors = Author::orderBy('name')->get();
        return view('ratings.create', compact('authors'));
    }

    public function getBooksByAuthor(Request $request)
    {
        $authorId = $request->get('author_id');
        $books = Book::where('author_id', $authorId)->orderBy('title')->get();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|between:1,10',
        ]);

        Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);

        return redirect()->route('books.index')->with('success', 'Rating submitted successfully!');
    }
}
