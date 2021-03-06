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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/add_friend', function() {
    return \App\User::first()->add_friend(2);
});

Route::get('/accept_friend', function() {
    return \App\User::find(2)->accept_friend(1);
});

Route::get('/friends', function() {
    return \App\User::find(1)->friends();
});

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => '/profile/{slug}'], function() {
        Route::get('/', 'ProfilesController@index')
            ->name('profile');

        Route::get('edit', 'ProfilesController@edit')
            ->name('profile.edit');

        Route::post('update', 'ProfilesController@update')
            ->name('profile.update');
    });

});