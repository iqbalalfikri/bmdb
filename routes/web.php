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


Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/edit-profile', function () {
    return view('edit_profile');
})->middleware('auth');

Route::get('/inbox', function () {
    return view('inbox');
})->middleware(['auth', 'member']);

Route::get('/saved-movie', function () {
    return view('saved_movie');
})->middleware(['auth', 'member']);

Route::get('/manage-movie', 'MovieController@index')->middleware(['auth', 'admin']);

Route::get('/manage-user', 'UserController@index')->middleware(['auth', 'admin']);

Route::get('/manage-genre', 'GenreController@index')->middleware(['auth', 'admin']);

Route::get('/add-user', function () {
    return view('add_user');
})->middleware(['auth', 'admin']);

Route::get('/edit-user', function () {
    return view('edit_user');
})->middleware(['auth', 'admin']);

Route::get('/delete-user', function () {
    return view('delete_user');
})->middleware(['auth', 'admin']);

Route::get('/add-movie', function () {
    return view('add_movie');
})->middleware(['auth', 'admin']);

Route::get('/edit-movie', function () {
    return view('edit_movie');
})->middleware(['auth', 'admin']);

Route::get('/delete-movie', function () {
    return view('delete-movie');
})->middleware(['auth', 'admin']);

Route::get('/add-genre', function () {
    return view('add_genre');
})->middleware(['auth', 'admin']);

Route::get('/edit-genre', function () {
    return view('edit_genre');
})->middleware(['auth', 'admin']);

Route::get('/delete-genre', function () {
    return view('delete_genre');
})->middleware(['auth', 'admin']);

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/{movie}', 'MovieController@show');
