<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(option('userRegister', 'off') == 'off') {
            abort(404);
        }
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first-name' => 'required',
            'last-name' => 'required',
            'national-code' => 'required|unique:users,username',
            'email' => 'required|email|unique:users',
            'tel' => 'required',
            'address' => 'required',
            'register-terms' => 'required',
        ], [
            'first-name.required' => 'لطفا نام خودتان را وارد کنید',
            'last-name.required' => 'لطفا نام خانوادگی خودتان را وارد کنید',
            'national-code.required' => 'لطفا کد ملی خودتان را وارد کنید',
            'national-code.unique' => 'کد ملی وارد شده از قبل در سیستم موجود است',
            'email.required' => 'لطفا ایمیل خودتان را وارد کنید',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید',
            'email.unique' => 'ایمیل وارد شده از قبل در سیستم موجود است',
            'tel.required' => 'لطفا شماره تلفن خودتان را وارد کنید',
            'address.required' => 'لطفا آدرس خودتان را وارد کنید',
            'register-terms.required' => 'لطفا شرایط را بخوانید',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['first-name'],
            'lastName' => $data['last-name'],
            'username' => $data['national-code'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'address' => $data['address'],
            'password' => bcrypt($data['national-code']),
        ]);

    }
}
