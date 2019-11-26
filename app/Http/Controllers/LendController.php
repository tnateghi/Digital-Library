<?php

namespace App\Http\Controllers;

use App\Lend;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LendController extends Controller
{
    public function admin()
    {
        return view('admin.lend.admin');
    }

    public function allActiveLends()
    {
        $lends = Lend::where('status', 'lend')->get();
        return view('admin.lend.allActiveLends', compact('lends'));
    }

    public function create()
    {
        $this->validate(request(), [
            'username' => 'required|exists:users,username',
            'bookId' => 'required|exists:books,id',
        ], [
            'username.required' => 'لطفا نام کاربری را وارد کنید',
            'username.exists' => 'نام کاربری وارد شده موجود نیست',
            'bookId.required' => 'لطفا بارکد کتاب را وارد کنید',
            'bookId.exists' => 'بارکد وارد شده موجود نیست',
        ]);

        $user = User::where('username', request('username'))->first();
        $bookId = request('bookId');

        //if user already has lend this book can not lend again
        if (!(Lend::where('user_id', $user->id)->where('book_id', $bookId)->where('status', 'lend')->get()->isEmpty())) {
            session()->flash('error', 'کتاب وارد شده از قبل در لیست امانت های جاری کاربر موجود است');
            return back()
                ->withInput();
        }

        //if user has 3 active lends can not lend other book (limits 3)
        if (Lend::where('user_id', $user->id)->where('status', 'lend')->count() >= 3) {
            session()->flash('error', 'تعداد امانت های کاربر به پایان رسیده است');
            return back()
                ->withInput();
        }

        if (!isExtant($bookId)) {
            session()->flash('error', 'تعداد امانت های جاری این کتاب با تعداد کتاب برابر است.');
            return back()
                ->withInput();
        }

        Lend::create([
            'book_id' => request('bookId'),
            'user_id' => $user->id,
        ]);

        session()->flash('message', 'عملیات با موفقیت انجام شد');

        return back();
    }

    public function userActiveLends(Request $request)
    {
        $user = User::where('username', $request->input('username'))->first();
        $levelError = false;
        if ($user) {
            $levelError = ($user->level == 'new' ? true : false);
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
        ], [
            'username.required' => 'لطفا نام کاربری را وارد کنید',
            'username.exists' => 'نام کاربری وارد شده موجود نیست',
        ]);

        $validator->after(function ($validator) use ($levelError) {
            if ($levelError) {
                $validator->errors()->add('username', 'نام کاربری وارد شده تایید نشده است');
            }
        });

        if ($validator->fails()) {
            return redirect(route('lends.admin'))
                ->withErrors($validator)
                ->withInput();
        }

        return redirect(route('users.activeLends', ['user' => $user->id]));
    }

    public function extendLend(Lend $lend)
    {
        if (!$lend) {
            abort(404);
        }

        do {
            if (lend_expired($lend->created_at)) {
                abort(404);
            }

            if ($lend->extend_count >= option('maxExtendCount', 1)) {
                abort(404);
            }

            $extend_count = $lend->extend_count;
            $book_id = $lend->book_id;
            $user_id = $lend->user_id;

            $lend->update([
                'status' => 'return',
            ]);

            Lend::create([
                'book_id' => $book_id,
                'user_id' => $user_id,
                'extend_count' => $extend_count + 1,
            ]);

            session()->flash('message', 'عملیات با موفقیت انجام شد');
        } while (false);

        return redirect(route('users.activeLends', ['user' => $user_id]));
    }

    public function returnLend(Lend $lend)
    {
        if ($lend->status != 'lend') {
            abort(404);
        }

        $created = Carbon::parse($lend->created_at);
        $end = Carbon::now();

        $length = $end->diffInDays($created);

        if ($length > option('lendPeriod', 14)) {
            $delay = $length - option('lendPeriod', 14);
        } else {
            $delay = 0;
        }

        $lend->update([
            'status' => 'return',
            'delay' => $delay
        ]);

        session()->flash('message', 'عملیات با موفقیت انجام شد');
        return redirect(route('users.activeLends', ['user' => $lend->user_id]));
    }

    public function activeLends(User $user)
    {
        $lends = $user->lends()->where('status', 'lend')->get();
        return view('admin.lend.activeLends', compact('lends', 'user'));
    }

    public function lendsHistory(User $user)
    {
        $lends = $user->lends()->where('status', 'return')->get();
        return view('admin.lend.lendsHistory', compact('lends', 'user'));
    }
}
