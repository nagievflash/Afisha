<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/events_loadmore/{offset}', 'HomeController@loadMore')->name('events_loadmore');
Route::post('/filter', 'GetEventsController@getEventsByFilter');
Route::get('/filter', 'GetEventsController@index');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/{page}', 'PageController@index')->name('page');
