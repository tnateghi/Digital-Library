<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:books-admin');
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function edit(Book $book)
    {
        return view('admin.book.edit', compact('book'));
    }

    public function show(Book $book)
    {
        return view('admin.book.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        session()->flash('message', __('messages.admin.books.messages.deleted'));
        return redirect(route('books.index'));
    }

    public function update(Book $book)
    {
        $this->validation();

        $book->update([
            'name' => request('bookName'),
            'author' => request('author'),
            'bookmaker' => request('bookmaker'),
            'count' => request('count'),
            'ed_year' => request('ed_year'),
            'description' => request('description'),
            'category_id' => request('category'),
        ]);

        session()->flash('message', __('messages.admin.books.messages.updated'));

        return redirect(route('books.index'));
    }

    public function index()
    {
        $books = Book::get();
        return view('admin.book.index', compact('books'));
    }

    public function store()
    {
        $this->validation();

        auth()->user()->books()->create([
            'name' => request('bookName'),
            'author' => request('author'),
            'bookmaker' => request('bookmaker'),
            'count' => request('count'),
            'ed_year' => request('ed_year'),
            'description' => request('description'),
            'category_id' => request('category'),
        ]);

        session()->flash('message', __('messages.admin.books.messages.created'));

        return back();
    }

    private function validation()
    {
        $this->validate(request(), [
            'bookName' => 'required',
            'author' => 'required',
            'bookmaker' => 'required',
            'count' => 'required',
            'category' => 'required|exists:book_categories,id',
            'ed_year' => 'required',
        ]);
    }
}
