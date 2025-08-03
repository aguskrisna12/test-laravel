<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');

        $query = Book::with(['author', 'category'])
            ->select('books.*')
            ->addSelect(DB::raw('COALESCE(AVG(ratings.rating), 0) as average_rating'))
            ->addSelect(DB::raw('COUNT(ratings.id) as voter_count'))
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->groupBy('books.id', 'books.title', 'books.author_id', 'books.category_id', 'books.created_at', 'books.updated_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('books.title', 'like', "%{$search}%")
                  ->orWhereHas('author', function ($authorQuery) use ($search) {
                      $authorQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $books = $query->orderBy('average_rating', 'desc')
                       ->orderBy('voter_count', 'desc')
                       ->orderBy('books.title', 'asc')
                       ->paginate($perPage);

        return view('books.index', compact('books', 'perPage', 'search'));
    }
}
