<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class LevelManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles-admin');
    }

    public function index()
    {
        $users = User::latest()->where('level', 'admin')->with('roles')->get();
        return view('admin.level.all' , compact('users'));
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'user_id' => 'required|exists:users,id',
        ],[
            'user_id.required' => 'لطفا آیدی کاربر را وارد کنید',
            'user_id.exists' => 'آیدی وارد شده موجود نیست',
        ]);

        $user = User::find($request->input('user_id'));
        if ($user->level == 'creator' || $user->level == 'admin') {
            session()->flash('error', 'این کاربر از قبل مدیر است');
        }

        elseif ($user->level == 'new') {
            session()->flash('error', 'این کابر تاییید نشده است');
        }

        else {
            $user->update([
               'level' => 'admin',
            ]);
            session()->flash('message', 'عملیات با موفقیت انجام شد');
            return redirect(route('level.index'));
        }

        return redirect(route('level.create'));

    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.level.edit' , compact('user', 'roles'));
    }

    public function show(User $user)
    {
        return view('admin.level.show' , compact('user'));
    }

    public function update(Request $request , User $user)
    {
        if($user->level == 'admin') {
            $user->roles()->sync($request->input('role_id'));
            session()->flash('message', 'عملیات با موفقیت انجام شد');
        } else {
            session()->flash('error', 'نقش کاربر باید مدیر باشد');
        }
        return redirect(route('level.index'));
    }

    public function destroy(User $user)
    {
        if($user->level != 'admin') {
            abort(404);
        }

        $user->roles()->detach();
        $user->update([
            'level' => 'user',
        ]);

        session()->flash('message', 'عملیات با موفقیت انجام شد');
        return redirect(route('level.index'));
    }
}
