<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:articles-admin');
    }

    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.article.index', compact('articles'));
    }

    public function comments()
    {
        $comments = Comment::latest()->get();
        return view('admin.article.comments', compact('comments'));
    }

    public function commentDestroy(Comment $comment)
    {
        $comment->delete();

        session()->flash('message' , 'دیدگاه با موفقیت حذف شد.');
        return back();
    }

    public function commentConfirm(Comment $comment)
    {

    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store()
    {

        $this->validation();

        auth()->user()->articles()->create([
            'title' => request('title'),
            'body' => request('body'),
            'state' => request('state'),
        ]);

        session()->flash('message' , 'نوشته با موفقیت ایجاد شد.');
        return back();
    }

    public function update(Article $article)
    {
        $this->validation();

        $article->update([
            'title' => request('title'),
            'body' => request('body'),
            'state' => request('state'),
        ]);

        session()->flash('message' , 'نوشته با موفقیت بروزرسانی شد.');
        return redirect(route('articles.edit', ['article' => $article->slug]));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        session()->flash('message' , 'نوشته با موفقیت حذف شد.');
        return back();
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    private function validation()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'state' => 'required',
        ],[
            'title.required' => 'لطفا عنوان نوشته را وارد کنید',
            'body.required' => 'لطفا متن نوشته را وارد کنید',
            'state.required' => 'لطفا حالت نوشته را انتخاب کنید',
        ]);
    }
}
