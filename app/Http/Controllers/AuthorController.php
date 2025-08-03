<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function topAuthors()
    {
        $authors = Author::select('authors.*')
            ->addSelect(DB::raw('COUNT(DISTINCT ratings.id) as voter_count'))
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->join('ratings', 'books.id', '=', 'ratings.book_id')
            ->where('ratings.rating', '>', 5)
            ->groupBy('authors.id', 'authors.name', 'authors.created_at', 'authors.updated_at')
            ->having('voter_count', '>', 0)
            ->orderBy('voter_count', 'desc')
            ->orderBy('authors.name', 'asc')
            ->limit(10)
            ->get();

        return view('authors.top', compact('authors'));
    }
}
