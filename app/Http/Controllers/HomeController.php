<?php

namespace App\Http\Controllers;

use App\Article;
use App\Book;
use App\Comment;
use App\Lend;
use Carbon\Carbon;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Morilog\Jalali\jDate;

class HomeController extends Controller
{
    public function show(Article $article)
    {
        $img = Gravatar::get('nategit@gmail.com');
        $comments = $article->comments()->get();
        return view('article.show', compact('article', 'comments', 'img'));
    }

    public function index()
    {
        $articles = Article::where('state', 'publish')->latest()->paginate(10);
        $articlesChunk = $articles->chunk(2);

        return view('article.index', compact('articles', 'articlesChunk'));
    }

    public function faq()
    {
        return view('article.faq');
    }

    /* public function contact()
     {
         return view('article.contact');
     }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $lendDays = array();
        $lendCount = array();

        for ($i = 0; $i < 7; $i++) {
            $lendDays[$i] = jDate::forge('now - ' . $i . ' days')->format('l');
            $lendCount[$i] = Lend::whereDate('created_at', '=', Carbon::parse('today - ' . $i . ' days')->toDateString())->get()->count();
        }

        $articles = Article::latest()->take(7)->get();
        $comments = Comment::latest()->take(3)->get();
        return view('admin.dashboard', compact('articles', 'lendDays', 'lendCount', 'comments'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function statistics()
    {
        return view('admin.statistics');
    }

    public function settingsStore()
    {
        $this->validate(request(), [
            'user-active-period' => 'required',
            'lend-period' => 'required',
            'max-active-lend' => 'required',
            'max-extend-count' => 'required',
        ], [
            'user-active-period.required' => 'لطفا دوره تمدید کاربر را وارد کنید',
            'lend-period.required' => 'لطفا دوره امانت را وارد کنید',
            'max-active-lend.required' => 'لطفا تعداد حداکثر امانت جاری را وارد کنید',
            'max-extend-count.required' => 'لطفا تعداد تمدید مجاز را وارد کنید',
        ]);

        option_update('userActivePeriod', request('user-active-period'));
        option_update('lendPeriod', request('lend-period'));
        option_update('maxActiveLend', request('max-active-lend'));
        option_update('maxExtendCount', request('max-extend-count'));
        option_update('userRegister', request('user-register') ? request('user-register') : 'off');

        session()->flash('message', 'تنظیمات با موفقیت بروزرسانی شد');

        return back();
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function faq_admin()
    {
        return view('admin.faq');
    }

    public function extendMyLend(Lend $lend)
    {
        if (!$lend) {
            abort(404);
        }

        do {
            if ($lend->user->id != auth()->user()->id) {
                abort(404);
            }

            if (lend_expired($lend->created_at)) {
                abort(404);
            }

            if ($lend->extend_count >= option('maxExtendCount', 1)) {
                abort(404);
            }

            $extend_count = $lend->extend_count;
            $book_id = $lend->book_id;

            $lend->update([
                'state' => 'return',
            ]);

            Lend::create([
                'book_id' => $book_id,
                'user_id' => auth()->user()->id,
                'extend_count' => $extend_count + 1,
            ]);

            session()->flash('message', 'عملیات با موفقیت انجام شد');
        } while (false);

        return back();
    }

    public function myActiveLends()
    {
        $lends = auth()->user()->lends()->where('state', 'lend')->get();
        return view('admin.lend.myActiveLends', compact('lends'));
    }

    public function myLendsHistory()
    {
        $lends = auth()->user()->lends()->where('state', 'return')->get();
        return view('admin.lend.myLendsHistory', compact('lends'));
    }

    public function bookSearch(Request $request)
    {
        if ($request->ajax()) {
            if (!request('search')) {
                return [];
            }
            $books = Book::search(request('search'))->orderBy('name')->get();
            $results = [];
            $i = 0;
            foreach ($books as $book) {
                $results [$i]['id'] = $book->id;
                $results [$i]['name'] = $book->name;
                $results [$i]['author'] = $book->author;
                $results [$i]['category'] = $book->category->name;
                $results [$i]['bookmaker'] = $book->bookmaker;
                $results [$i]['ed_year'] = $book->ed_year;

                if (isExtant($book->id)) {
                    $results [$i]['status'] = true;
                } else {
                    $results [$i]['status'] = false;
                }
                $i++;
            }
            return response()->json($results);
        }

        return view('admin.book.search');
    }

}
