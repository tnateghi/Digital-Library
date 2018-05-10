<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Article $article)
    {
        $this->validate(request(), [
           'body' => 'required',
        ],[
            'body.required' => 'متن دیدگاه نمیتواند خالی باشد',
        ]);

        $user = auth()->user();

        $article->comments()->create([
            'user_id' => $user->id,
            'body' => request('body')
        ]);

        session()->flash('message', 'دیدگاه شما با موفقیت ثبت شد.');

        return back();
    }
}
