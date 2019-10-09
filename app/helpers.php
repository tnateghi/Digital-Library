<?php

use App\Lend;
use App\Book;
use App\Option;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\DNS1D;

/**
 * @param $name
 * @param $default_value
 * @return mixed
 * if option exists return value else create it and set default value
 */
function option($name, $default_value)
{
    if (!in_array($name, ['userActivePeriod', 'lendPeriod', 'maxActiveLend', 'maxExtendCount', 'userRegister'])) {
        return 'error';
    }
    return $option = \App\Option::where('name', $name)->firstOrCreate(['name' => $name], ['value' => $default_value])->value;
}


/**
 * @param $name
 * @param $value
 * if option exists update else create it
 * @return mixed
 */
function option_update($name, $value)
{
    if (!in_array($name, ['userActivePeriod', 'lendPeriod', 'maxActiveLend', 'maxExtendCount', 'userRegister'])) {
        return 'error';
    }
    $option = Option::firstOrNew(array('name' => $name));
    $option->value = $value;
    $option->save();
}

function lend_expired($date)
{
    return (Carbon::parse($date . '+' . option('lendPeriod', 14) . 'days') < Carbon::now());
}

function lend_return_date($date)
{
    return (Carbon::parse($date . '+' . option('lendPeriod', 14) . 'days'));
}

function href($name)
{
    $string = 'href=' . route($name);
    if (Route::currentRouteName() == $name) {
        $string .= ' class=active';
    }
    return $string;
}

function active_menu(array $names)
{
    foreach ($names as $name) {
        if (Route::currentRouteName() == $name) {
            return 'class=active';
        }
    }
}

function isAdmin()
{
    return auth()->user()->level == 'admin' || auth()->user()->level == 'creator' ? true : false;
}

function tab($name)
{
    return $GLOBALS[$name];
}

function isExtant($bookId)
{
    $bookCount = Book::find($bookId)->count;
    $bookLendCount = Lend::where('book_id', $bookId)->where('state', 'lend')->get()->count();

    return ($bookCount > $bookLendCount) ? true : false;
}

function barcode($str)
{
    $barcode = new DNS1D();
    if (!is_dir(public_path() . '/img/barcode')) {
        File::makeDirectory(public_path() . '/img/barcode/');
    }
    return $barcode->getBarcodePNGPath($str, "C39E", 3, 33, array(69, 78, 89));
}

function can_delete_user($user_id)
{
    $user = User::find($user_id);

    if ($user->id == auth()->user()->id) {
        return false;
    }

    if ($user->level == 'creator') {
        return false;
    }

    if (!in_array(auth()->user()->level, ['admin', 'creator'])) {
        return false;
    }

    if (auth()->user()->level == 'creator') {
        return true;
    }

    if (Gate::allows('roles-admin')) {
        return true;
    }

    if (Gate::allows('users-admin') && in_array($user->level, ['user', 'new'])) {
        return true;
    }

    return false;
}

function str_random($length = 20)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}
