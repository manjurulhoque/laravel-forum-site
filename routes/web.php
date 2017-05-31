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
Route::get('/', 'PagesController@home')->name('home');
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as' => 'logout', 'uses'=>'Auth\LoginController@logout']);

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth']], function(){
    //Route::get('posts/{post}', 'PostController@show')->name('posts.show');
    // Route::post('posts/{post}', ['uses' => 'PostController@store', 'as' => 'posts.store']);
    // Route::get('posts/{post}/edit', ['uses' => 'PostController@edit', 'as' => 'posts.edit']);
    // Route::put('posts/{post}', ['uses' => 'PostController@update', 'as' => 'posts.update']);
    // Route::delete('posts/{post}', ['uses' => 'PostController@destroy', 'as' => 'posts.destroy']);
    // Route::get('posts/{post}/delete', ['uses' => 'PostController@delete', 'as' => 'posts.delete']);
    Route::resource('posts', 'PostController', ['except' => 'show']);
    Route::resource('comments', 'CommentController');
    Route::resource('profiles', 'ProfileController');
});
Route::get('posts/{post}', 'PostController@show')->name('posts.show');