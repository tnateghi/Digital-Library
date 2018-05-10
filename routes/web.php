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

Route::get('/', 'HomeController@listAll');
Route::get('faq', 'HomeController@faq')->name('faq');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::get('article/{article}', 'HomeController@show')->name('article.show');
Route::post('article/{article}/comment', 'CommentController@store')->middleware('auth')->name('comment.store');

Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function () {
    $this->get('dashboard', 'HomeController@dashboard')->name('dashboard');
    $this->get('test', 'HomeController@test')->name('test');
    $this->get('settings', 'HomeController@settings')->name('settings')->middleware('can:settings-admin');
    $this->get('statistics', 'HomeController@statistics')->name('statistics');
    $this->post('settings', 'HomeController@settingsStore')->name('settings.store')->middleware('can:settings-admin');

    $this->resource('roles' , 'RoleController');
    $this->resource('books', 'BookController');
    $this->get('book-categories', 'BookCategoryController@index')->name('book-categories.index');
    $this->post('book-categories', 'BookCategoryController@store')->name('book-categories.store');
    $this->delete('book-categories', 'BookCategoryController@destroy')->name('book-categories.destroy');
    $this->patch('book-categories', 'BookCategoryController@update')->name('book-categories.update');
    $this->resource('articles', 'ArticleController');
    $this->get('articles/comments/index', 'ArticleController@comments')->name('articles.comments');
    $this->resource('users', 'UserController');
    $this->resource('level' , 'LevelManageController' , ['parameters' => ['level' => 'user']]);

    $this->group(['prefix' => 'users'], function () {
        $this->get('{user}/edit-image', 'UserController@editImage')->name('users.editImage');
        $this->post('{user}/edit-image', 'UserController@updateImage')->name('users.updateImage');
        $this->get('new/index', 'UserController@newUsers')->name('users.new');
        $this->get('{user}/confirm', 'UserController@confirm')->name('users.confirm');
    });

    $this->get('user-search', 'UserController@search')->name('users.search');

    $this->group(['prefix' => 'lends', 'middleware' => 'can:lends-admin'], function () {
        $this->get('admin', 'LendController@admin')->name('lends.admin');
        $this->post('user-active-lends', 'LendController@userActiveLends')->name('lends.userActiveLends');
        $this->get('{user}/lends-history', 'LendController@lendsHistory')->name('users.lendsHistory');
        $this->get('{user}/active-lends', 'LendController@activeLends')->name('users.activeLends');
        $this->get('all-active-lends', 'LendController@allActiveLends')->name('lends.allActiveLends');

        $this->post('create', 'LendController@create')->name('lends.create');
        $this->get('extend/{lend}', 'LendController@extendLend')->name('lends.extend');
        $this->get('return/{lend}', 'LendController@returnLend')->name('lends.return');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    $this->get('profile', 'HomeController@profile')->name('profile');
    $this->get('lends/my-active-lends', 'HomeController@myActiveLends')->name('lends.myActiveLends');
    $this->get('lends/my-lends-history', 'HomeController@myLendsHistory')->name('lends.myLendsHistory');
    $this->get('lends/extend-my-lend/{lend}', 'HomeController@extendMyLend')->name('lends.extendMyLend');
    $this->get('faq', 'HomeController@faq_admin')->name('admin-faq');

    $this->get('book-search', 'HomeController@bookSearch')->name('books.search');
});



