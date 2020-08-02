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
Route::post('/add-to-wishlist', 'WishlistController@addToWishlist');
Route::get('/filter', 'GetEventsController@showEventsByFilter');
Route::get('/events/{slug}', 'GetEventsController@index');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('profileUpdate');
Route::post('/search', 'SearchController@show');
Route::get('/search/{request}', 'SearchController@index')->name('search');
Route::get('/tags/{tag}', 'TagController@index')->name('tag');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/{slug}', 'NewsController@show');
Route::post('/subscribe', 'SubscribeController@create');

Route::resource('wishlist', 'WishlistController', [
    'names' => [
        'index' => 'wishlist'
    ]
]);;

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/{page}', 'PageController@index');
