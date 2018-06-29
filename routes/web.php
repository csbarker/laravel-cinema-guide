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

use App\Cinema as Cinema;
use App\Http\Resources\Cinema as CinemaResource;
use App\Http\Resources\CinemaCollection as CinemaCollection;

use App\Movie as Movie;
use App\Http\Resources\Movie as MovieResource;
use App\Http\Resources\MovieCollection as MovieCollection;

use App\SessionTime as SessionTime;
use App\Http\Resources\SessionTimeCollection as SessionTimeCollection;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Cinema Routes
 *      /cinemas                           List of cinemas
 *      /cinemas/name                      Information about a cinema
 */
Route::get('/cinemas/{name?}', function ($name = null) {
    if ($name === null) {
        return new CinemaCollection(Cinema::all());
    }

    $cinema = Cinema::where('name', $name)->first();

    if ($cinema !== null) {
        return new CinemaResource($cinema);
    }
    
    return Response::json(['error'=> 'Cinema not found'], 404);
})->name('cinemas');

/**
 * Movie Routes
 *      /movies         List of movies
 *      /movies/name    Individual movie
 */
Route::get('/movies/{name?}', function($name = null) {
    if ($name === null) {
        return new MovieCollection(Movie::all());
    }

    $movie = Movie::where('name', $name)->first();

    if ($movie !== null) {
        return new MovieResource($movie);
    }
    
    return Response::json(['error'=> 'Movie not found'], 404);
})->name('movies');

/**
 * Session Times
 *      /sessions                             List of session times
 *      /sessions/{cinema_id}                 List of session times at a particular cinema
 *      /sessions/{cinema_id}/{movie_id}      List of session times of a particular movie at a particular cinema
 */
Route::get('/sessions/{cinema_id?}/{movie_id?}', function ($cinema_id = 'any', $movie_id = 'all') {
    $all = false;
    $where = [];

    if (ctype_digit($cinema_id)) {
        $where[] = ['cinema_id', $cinema_id];
    }

    if (ctype_digit($movie_id)) {
        $where[] = ['movie_id', $movie_id];
    }

    if ($cinema_id === 'any' && $movie_id === 'all') {
        $all = true;
        $sessions = SessionTime::all();
    } else {
        $sessions = SessionTime::where($where)->get();
    }

    if ($all === false && ($where === [] || $sessions->count() == 0)) {
        return Response::json(['error'=> 'No sessions found'], 404);
    }

    return new SessionTimeCollection($sessions);
})->name('sessions');