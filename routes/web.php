<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->middleware('guest');
Route::get('faq', 'HomeController@faq')->name('faq');

Route::get('article/{article}', 'HomeController@show')->name('article.show');
Route::post('article/{article}/comment', 'CommentController@store')->middleware('auth')->name('comment.store');

Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function () {
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('settings', 'HomeController@settings')->name('settings')->middleware('can:settings-admin');
    Route::get('statistics', 'HomeController@statistics')->name('statistics');
    Route::post('settings', 'HomeController@settingsStore')->name('settings.store')->middleware('can:settings-admin');

    Route::resource('roles' , 'RoleController');
    Route::resource('books', 'BookController');
    Route::get('book-categories', 'BookCategoryController@index')->name('book-categories.index');
    Route::post('book-categories', 'BookCategoryController@store')->name('book-categories.store');
    Route::delete('book-categories', 'BookCategoryController@destroy')->name('book-categories.destroy');
    Route::patch('book-categories', 'BookCategoryController@update')->name('book-categories.update');
    Route::resource('articles', 'ArticleController');
    Route::get('articles/comments/index', 'ArticleController@comments')->name('articles.comments');
    Route::resource('users', 'UserController');

    Route::group(['prefix' => 'users'], function () {
        Route::get('new/index', 'UserController@newUsers')->name('users.new');
        Route::get('{user}/confirm', 'UserController@confirm')->name('users.confirm');
    });

    Route::get('user-search', 'UserController@search')->name('users.search');

    Route::group(['prefix' => 'lends', 'middleware' => 'can:lends-admin'], function () {
        Route::get('admin', 'LendController@admin')->name('lends.admin');
        Route::post('user-active-lends', 'LendController@userActiveLends')->name('lends.userActiveLends');
        Route::get('{user}/lends-history', 'LendController@lendsHistory')->name('users.lendsHistory');
        Route::get('{user}/active-lends', 'LendController@activeLends')->name('users.activeLends');
        Route::get('all-active-lends', 'LendController@allActiveLends')->name('lends.allActiveLends');

        Route::post('create', 'LendController@create')->name('lends.create');
        Route::get('extend/{lend}', 'LendController@extendLend')->name('lends.extend');
        Route::get('return/{lend}', 'LendController@returnLend')->name('lends.return');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('profile', 'HomeController@profile')->name('profile');
    Route::get('lends/my-active-lends', 'HomeController@myActiveLends')->name('lends.myActiveLends');
    Route::get('lends/my-lends-history', 'HomeController@myLendsHistory')->name('lends.myLendsHistory');
    Route::get('lends/extend-my-lend/{lend}', 'HomeController@extendMyLend')->name('lends.extendMyLend');
    Route::get('faq', 'HomeController@faq_admin')->name('admin-faq');

    Route::get('book-search', 'HomeController@bookSearch')->name('books.search');
});



