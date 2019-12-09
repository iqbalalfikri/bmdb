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

// Route::get('/profile', function () {
//     return view('profile');
// })->middleware('auth');



Route::get('/edit-profile', function () {
    return view('edit_profile');
})->middleware('auth');

Route::get('/inbox', 'InboxController@index')->middleware(['auth', 'member'])->name('inbox');

Route::get('/saved-movie', 'MovieUserController@index')->middleware(['auth', 'member']);

Route::group(
    ['prefix' => 'manage', 'middleware' => ['auth', 'admin']],
    function () {
        Route::get('/movie', 'MovieController@index')->name('manage-movie');
        Route::get('/movie/add', 'MovieController@create')->name('add-movie');
        Route::post('/movie', 'MovieController@store')->name('store-movie');
        Route::get('/movie/{movie}/edit', 'MovieController@edit')->name('edit-movie');
        Route::patch('/movie/{movie}', 'MovieController@update')->name('update-movie');
        Route::delete('/movie/{movie}', 'MovieController@destroy')->name('delete-movie');

        Route::get('/user', 'UserController@index')->name('manage-user');
        Route::get('/user/add', 'UserController@create')->name('add-user');
        Route::post('/user', 'UserController@store')->name('store-user');
        Route::get('/user/{user}/edit', 'UserController@edit')->name('edit-user');
        Route::patch('/user/{user}', 'UserController@update')->name('update-user');
        Route::delete('/user/{user}', 'UserController@destroy')->name('delete-user');

        Route::get('/genre', 'GenreController@index')->name('manage-genre');
        Route::get('/genre/add', 'GenreController@create')->name('add-genre');
        Route::post('/genre', 'GenreController@store')->name('store-genre');
        Route::get('/genre/{genre}/edit', 'GenreController@edit')->name('edit-genre');
        Route::patch('/genre/{genre}', 'GenreController@update')->name('update-genre');
        Route::delete('/genre/{genre}', 'GenreController@destroy')->name('delete-genre');
    }
);

Auth::routes();


Route::put('/profile/{user}', 'InboxController@store')->middleware('auth')->name('send-message');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/profile/{user}', 'UserController@show')->middleware('auth')->name('profile');


Route::get('/movie/{movie}', 'MovieController@show')->name('movie');

Route::post('/comment', 'CommentController@store')->name('store-comment')->middleware('auth');
