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

// use App\Mail\NewUserWelcomeMail;


Auth::routes();

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'PostController@index')->name('post.index');
Route::get('/p/create', 'PostController@create')->name('post.create');
Route::get('/p/{post}', 'PostController@show')->name('post.show');
Route::post('/p', 'PostController@store')->name('post.store');

Route::post('follow/{user}', 'FollowController@store')->name('follow');
Route::get('all-users' , 'ProfilesController@users')->name('users.all');


// Route::get('/email', function(){
//     return new NewUserWelcomeMail();
// });
