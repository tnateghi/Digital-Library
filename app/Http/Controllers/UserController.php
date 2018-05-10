<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

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
        if($user->level != 'new') {
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
        return view('admin.user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->validation(true);

        $user->update([
            'firstName' => request('first-name'),
            'lastName' => request('last-name'),
            'tel' => request('tel'),
            'address' => request('address'),
        ]);

        session()->flash('message' , 'اطلاعات کاربر با موفقیت بروزرسانی شد.');

        return back();

    }

    public function destroy(User $user)
    {
        if($user->level == 'creator') {
            abort(404);
        }

        if($user->level == 'admin' && auth()->user()->level == 'admin') {
            abort(404);
        }

        if($user->image != 'default.jpg') {
            File::delete(public_path('user-img/'.$user->image));
        }

        $user->delete();

        session()->flash('message', 'کاربر با موفقیت حذف شد');

        return redirect(route('users.index'));
    }

    public function editImage(User $user)
    {
        return view('admin.user.editImage', compact('user'));
    }

    public function updateImage(User $user)
    {
        $this->validate(request(), [
           'file' => 'required|file|image|mimes:jpeg|max:500',
        ], [
            'file.required' => 'لطفا فایل تصویر را انتخاب کنید',
            'file.file' => 'لطفا فایلی را برای ارسال انتخاب کنید',
            'file.image' => 'لطفا یک فایل عکس انتخاب کنید',
            'file.mimes' => 'لطفا عکس با فرمت jpeg ارسال کنید',
            'file.max' => 'اندازه ی فایل ارسالی نباید بیشتر از 500 کیلوبایت باشد',
        ]);


        if($user->image == 'default.jpg') {
            do {
                $randomString = str_random(20).'.jpg';
                $user_image = User::where('image', $randomString)->get();

            }while(!$user_image->isEmpty());

            $user->update([
                'image' => $randomString,
            ]);

            Input::file('file')
                ->move(public_path('user-img'),$randomString);

        } else {
            $randomString = $user->image;

            Input::file('file')
                ->move(public_path('user-img'),$randomString);
        }



        if($user->image == 'default.jpg') {

        }

        session()->flash('message' , 'اطلاعات کاربر با موفقیت بروزرسانی شد.');
        return back();
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $this->validation();

        (new User)->create([
            'username' => request('national-code'),
            'firstName' => request('first-name'),
            'lastName' => request('last-name'),
            'email' => request('email'),
            'tel' => request('tel'),
            'address' => request('address'),
            'password' => bcrypt(request('national-code')),
            'level' => 'user',
        ]);

        session()->flash('message' , 'کاربر با موفقیت اضافه شد');

        return back();
    }

    /**
     * @param bool $update
     * if update is true email and username field is not required
     * and user can not edit this fields
     */
    private function validation($update = false)
    {

        if($update) {
            $this->validate(request(), [
                'first-name' => 'required',
                'last-name' => 'required',
                'tel' => 'required',
                'address' => 'required',

            ], [
                'first-name.required' => 'لطفا نام کاربر را وارد کنید',
                'last-name.required' => 'لطفا نام خانوادگی کاربر را وارد کنید',
                'email.email' => 'لطفا ایمیل کاربر را به درستی وارد کنید',
                'national-code.required' => 'لطفا کد ملی کاربر را وارد کنید',
                'tel.required' => 'لطفا شماره تلفن کاربر را وارد کنید',
                'address.required' => 'لطفا آدرس کاربر را وارد کنید',
            ]);
        } else {
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
        }

    }

    public function search()
    {
        if(! request('search')) {
            $users = [];
        }
        else {
            $users = User::search(request('search'))->get();
        }
        return view('admin.user.search', compact('users'));
    }
}
