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

use Illuminate\Http\Request;

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Cinema Routes
 *    /cinemas            List of cinemas
 *    /cinemas/{name}     Information about a cinema
 */

Route::any('/cinemas', 'CinemaController@index')->name('cinemas');
Route::any('/cinemas/{name}', 'CinemaController@resource')->name('cinemas');

/**
 * Movie Routes
 *    /movies           List of movies
 *    /movies/{name}    Individual movie
 */

Route::any('/movies', 'MovieController@index')->name('movies');
Route::any('/movies/{name}', 'MovieController@resource')->name('movies');

/**
 * Session Times
 *    /sessions                             List of session times
 *    /sessions/{cinema_id}                 List of session times at a particular cinema
 *    /sessions/{cinema_id}/{movie_id}      List of session times of a particular movie at a particular cinema
 */

Route::any('/sessions/{cinema_id?}/{movie_id?}', 'SessionController@index')->name('sessions');