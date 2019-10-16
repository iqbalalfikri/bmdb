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

Route::get('/', function () {
    return view('home');
});

Route::post('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/edit-profile', function () {
    return view('edit_profile');
});

Route::get('/inbox', function () {
    return view('inbox');
});

Route::get('/saved-movie', function () {
    return view('saved_movie');
});

Route::get('/manage-movie', 'MovieController@index');

Route::get('/manage-user', 'UserController@index');

Route::get('/manage-genre', 'GenreController@index');

Route::get('/add-user', function () {
    return view('add_user');
});

Route::get('/edit-user', function () {
    return view('edit_user');
});

Route::get('/delete-user', function () {
    return view('delete_user');
});

Route::get('/add-movie', function () {
    return view('add_movie');
});

Route::get('/edit-movie', function () {
    return view('edit_movie');
});

Route::get('/delete-movie', function () {
    return view('delete-movie');
});

Route::get('/add-genre', function () {
    return view('add_genre');
});

Route::get('/edit-genre', function () {
    return view('edit_genre');
});

Route::get('/delete-genre', function () {
    return view('delete_genre');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
