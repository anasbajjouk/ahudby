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
    return redirect('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Auth::routes();

Route::get('/authors','AuthorController@userIndex')->name('authorUserIndex');
Route::get('/authors/{author}','AuthorController@userShow')->name('authorUserShow');

Route::get('/periods','PeriodController@userIndex')->name('periodUserIndex');
Route::get('/periods/{period}','PeriodController@userShow')->name('periodUserShow');

Route::get('/videos','VideoController@userIndex')->name('videoUserIndex');

Route::get('/photos','PhotoController@userIndex')->name('photoUserIndex');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('dashboard', 'HomeController@index')->name('admin.index');

    Route::resource('users', 'UserController');
    Route::resource('author', 'AuthorController');
    Route::resource('period', 'PeriodController');
    Route::resource('event', 'EventController');
    Route::resource('video', 'VideoController');
    Route::resource('photo', 'PhotoController');
    Route::resource('composition', 'CompositionController');
    //end
});
