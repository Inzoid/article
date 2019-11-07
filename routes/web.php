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

Route::get('/', 'ArticlesController@index');
Route::get('/create', 'ArticlesController@create');
Route::get('/edit', 'ArticlesController@edit');
Route::get('/show', 'ArticlesController@show');

Route::resource('/comments', 'CommentController', ['only'=>['store']]);
Route::resource('/articles', 'ArticlesController');

Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');

Route::get('login',  'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

Route::get('/forgot-password', 'ReminderController@create')->name('reminders.create');
Route::post('/forgot-password', 'ReminderController@store')->name('reminders.store');

Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminders.edit');
Route::post('reset-password/{id}/{token}', 'ReminderController@update')->name('reminders.update');
