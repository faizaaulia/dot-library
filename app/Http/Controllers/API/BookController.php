<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Exception;

class BookController extends Controller
{
    public function index(Request $request) {
        try {
            $books = Book::select('id', 'title', 'pages', 'published_on')->get();

            if ($request->get('title')) {
                $search = $request->get('title');
                $books = Book::where('title', 'LIKE', "%$search%")
                               ->select('id', 'title', 'pages', 'published_on')->get();
            }
    
            if ($request->get('author')) {
                $search = $request->get('author');
                $books = Book::whereHas('authors', function($q) use($search) {
                    $q->where('name', 'LIKE', "%$search%");
                })->select('id', 'title', 'pages', 'published_on')->get();
            }

            $book_exists = $books->count() > 0;
            
            return response()->json([
                'success' => $book_exists,
                'message' => $book_exists ? 'Successfully get books data' : 'Books not found',
                'data' => $book_exists ? $books : []
            ], 200);
        } catch (Exception $e) {
            report($e);
            
            return response()->json([
                'success' => false,
                'message' => 'Something wrong',
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function show($id) {
        try {
            $book = Book::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Successfully get book detail',
                'data' => $book
            ], 200);
        } catch (Exception $e) {
            report($e);
            
            return response()->json([
                'success' => false,
                'message' => 'Something wrong',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
