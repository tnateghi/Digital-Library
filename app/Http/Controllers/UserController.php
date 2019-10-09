<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users-admin');
    }

    public function index()
    {
        $users = User::where('level', '!=', 'new')->get();
        return view('admin.user.index', compact('users'));
    }

    public function newUsers()
    {
        $users = User::where('level', 'new')->get();

        return view('admin.user.new', compact('users'));
    }

    public function confirm(User $user)
    {
        if ($user->level != 'new') {
            abort(404);
        }

        $user->update([
            'level' => 'user',
        ]);

        session()->flash('message', 'عملیات با موفقیت انجام شد');

        return back();
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'file' => 'file|image|mimes:jpeg|max:500',
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'nullable|Email|unique:users,email,' . $user->id,
            'national-code' => 'required|unique:users,username,' . $user->id,
            'tel' => 'required',
            'address' => 'required',

        ], [
            'file.required' => 'لطفا فایل تصویر را انتخاب کنید',
            'file.file' => 'لطفا فایلی را برای ارسال انتخاب کنید',
            'file.image' => 'لطفا یک فایل عکس انتخاب کنید',
            'file.mimes' => 'لطفا عکس با فرمت jpeg ارسال کنید',
            'file.max' => 'اندازه ی فایل ارسالی نباید بیشتر از 500 کیلوبایت باشد',

            'first-name.required' => 'لطفا نام کاربر را وارد کنید',
            'last-name.required' => 'لطفا نام خانوادگی کاربر را وارد کنید',
            'email.email' => 'لطفا ایمیل کاربر را به درستی وارد کنید',
            'email.unique' => 'ایمیل وارد شده از قبل در سیستم موجود است',
            'national-code.required' => 'لطفا کد ملی کاربر را وارد کنید',
            'national-code.unique' => 'کد ملی وارد شده از قبل در سیستم موجود است',
            'tel.required' => 'لطفا شماره تلفن کاربر را وارد کنید',
            'address.required' => 'لطفا آدرس کاربر را وارد کنید',

        ]);

        if (request('file')) {
            if ($user->image == 'default.jpg') {
                do {
                    $randomString = str_random(20) . '.jpg';
                    $user_image = User::where('image', $randomString)->get();

                } while (!$user_image->isEmpty());

                $user->update([
                    'image' => $randomString,
                ]);

                request('file')
                    ->move(public_path('user-img'), $randomString);

            } else {
                $randomString = $user->image;

                request('file')
                    ->move(public_path('user-img'), $randomString);
            }
        }

        if ($user->level != 'creator' && Gate::allows('roles-admin')) {
            $this->validate(request(), [
                'role_id' => 'exists:roles,id',
            ], [
                'role_id.exists' => 'آیدی مقام در پایگاه داده یافت نشد',
            ]);

            if (request('role_id')) {
                $user->level = 'admin';
            } else {
                $user->level = 'user';
            }

            $user->roles()->sync(request()->input('role_id'));
        }

        $user->update([
            'firstName' => request('first-name'),
            'lastName' => request('last-name'),
            'tel' => request('tel'),
            'address' => request('address'),
        ]);

        session()->flash('message', 'اطلاعات کاربر با موفقیت بروزرسانی شد.');

        return back();

    }

    public function destroy(User $user)
    {
        if ($user->level == 'creator') {
            abort(404);
        }

        if ($user->level == 'admin' && auth()->user()->level == 'admin') {
            abort(404);
        }

        if ($user->image != 'default.jpg') {
            File::delete(public_path('user-img/' . $user->image));
        }

        $user->delete();

        session()->flash('message', 'کاربر با موفقیت حذف شد');

        return redirect(route('users.index'));
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'nullable|Email|unique:users',
            'national-code' => 'required|unique:users,username',
            'tel' => 'required',
            'address' => 'required',

        ], [
            'first-name.required' => 'لطفا نام کاربر را وارد کنید',
            'last-name.required' => 'لطفا نام خانوادگی کاربر را وارد کنید',
            'email.email' => 'لطفا ایمیل کاربر را به درستی وارد کنید',
            'email.unique' => 'ایمیل وارد شده از قبل در سیستم موجود است',
            'national-code.required' => 'لطفا کد ملی کاربر را وارد کنید',
            'national-code.unique' => 'کد ملی وارد شده از قبل در سیستم موجود است',

            'tel.required' => 'لطفا شماره تلفن کاربر را وارد کنید',
            'address.required' => 'لطفا آدرس کاربر را وارد کنید',
        ]);

        User::create([
            'username' => request('national-code'),
            'firstName' => request('first-name'),
            'lastName' => request('last-name'),
            'email' => request('email'),
            'tel' => request('tel'),
            'address' => request('address'),
            'password' => bcrypt(request('national-code')),
            'level' => 'user',
        ]);

        session()->flash('message', 'کاربر با موفقیت اضافه شد');

        return back();
    }

    public function search()
    {
        if (!request('search')) {
            $usersChunk = [];
            return view('admin.user.search', compact('usersChunk'));
        } else {
            $users = User::search(request('search'))->get();
            $usersChunk = $users->chunk(1);
            return view('admin.user.search', compact('usersChunk'));
        }
    }
}
