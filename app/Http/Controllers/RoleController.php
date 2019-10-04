<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles-admin');
    }

    public function index()
    {
        $roles = Role::latest()->paginate(25);
        return view('admin.roles.all' ,  compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'permission_id' => 'required',
        ], [
            'name.required' => 'لطفا نام مقام را وارد کنید',
            'permission_id.required' => 'لطفا دسترسی های مقام را انتخاب کنید',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'label' => $request->input('label'),
        ]);
        $role->permissions()->sync($request->input('permission_id'));

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request , [
            'permission_id' => 'required',
            'name' => 'required',
        ]);

        $role->update([
            'name' => $request->input('name'),
            'label' => $request->input('label'),
        ]);
        $role->permissions()->sync($request->input('permission_id'));

        session()->flash('message', 'عملیات با موفقیت انجام شد');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('message', 'عملیات با موفقیت انجام شد');

        return redirect(route('roles.index'));
    }
}
