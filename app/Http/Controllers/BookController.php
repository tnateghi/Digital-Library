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
        session()->flash('message' , 'کتاب با موفقیت حذف شد.');
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

        session()->flash('message' , 'اطلاعات کتاب با موفقیت بروزرسانی شد.');

        return back();
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

        session()->flash('message' , 'کتاب با موفقیت اضافه شد');

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

        ], [
            'bookName.required' => 'لطفا نام کتاب را وارد کنید',
            'author.required' => 'لطفا نام نویسنده را وارد کنید',
            'bookmaker.required' => 'لطفا نام انتشارات کتاب را وارد کنید',
            'count.required' => 'لطفا تعداد کتاب را وارد کنید',
            'category.required' => 'لطفا دسته بندی را انتخاب کنید',
            'category.exists' => 'دسته بندی وارد شده موجود نیست',
            'ed_year.required' => 'لطفا سال چاپ را وارد کنید',
        ]);
    }
}
