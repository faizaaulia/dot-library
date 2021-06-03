<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the book dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::with(['authors:name'])
                       ->withCount(['authors'])
                       ->orderBy('updated_at', 'DESC')
                       ->paginate(10);
        return view('books.index', compact('books'));
    }

        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::get(['id', 'name']);

        return view('books.create', compact('authors'));
    }
    
    /**
     * Store new created book or update specified $id book
     *
     * @param  int $id
     * @param  \App\Http\Requests\BookRequest; $request
     * @return \Illuminate\Http\Response
     */
    public function store($id = null, BookRequest $request) {
        $data = $request->except(['author_id']);
        if ($id) {
            $book = Book::findOrFail($id);
            $book->update($data);
            $book->authors()->sync($request->author_id);    

            return redirect()->route('books.show', ['book' => $id])->with(['success' => 'Berhasil mengubah buku']);
        } else {
            $book = Book::create($data);
            $book->authors()->attach($request->author_id);

            return redirect()->route('books.index')->with(['success' => 'Berhasil menambahkan buku']);
        }

    }
    
    /**
     * Show the specified book's detail
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = Book::with(['authors:id,name'])->findOrFail($id);
        
        return view('books.show', compact('data'));
    }
    
    /**
     * Show the form for editing the specified book.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $book = Book::with(['authors:id,name'])->findOrFail($id);
        $authors = Author::get(['id', 'name']);
        
        return view('books.create', compact('book', 'authors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        $book->authors()->detach();

        return redirect()->route('books.index')->with(['success' => 'Berhasil menghapus data buku']);
    }
}
