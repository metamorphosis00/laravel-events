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

Route::view('/home', 'home');
Route::get('/', 'SiteController@index');
Route::get('/events', 'SiteController@events')->name('events');
Route::get('/events/{id}/request', 'SiteController@eventRequest')->name('event.request');
Route::post('/saveEventRequest', 'SiteController@saveEventRequest')->name('save.event.request');
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin.index')->middleware('role:admin|organizer');
    Route::resource('users', 'Admin\UserController')->middleware('role:admin');
    Route::resource('events', 'Admin\EventController')->middleware('role:admin|organizer');
    Route::get('/content', 'Admin\ContentController@index')->middleware('role:admin')->name('admin.content');
    Route::post('/content/update', 'Admin\ContentController@update')->middleware('role:admin')->name('admin.content.update');
});

