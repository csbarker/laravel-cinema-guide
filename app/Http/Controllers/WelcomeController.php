<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http;

use App\Movie as Movie;
use App\Http\Resources\Movie as MovieResource;
use App\Http\Resources\MovieCollection as MovieCollection;

use App\Cinema as Cinema;
use App\Http\Resources\Cinema as CinemaResource;
use App\Http\Resources\CinemaCollection as CinemaCollection;

use App\SessionTime as SessionTime;

class WelcomeController extends Controller
{
    public function index() {
        $cinema_count = Cinema::count();
        $movie_count = Movie::count();
    
        $random_cinema = Cinema::find(rand(2, $cinema_count));
        $random_movie = Movie::find(rand(2, $movie_count));
    
        $example_cinema_name = $random_cinema->name;
        $example_movie_name = $random_movie->name;
    
        $example_endpoints = [
            [
                '/cinemas',
                '/cinemas',
                'List of all cinemas'
            ],
            [
                "/cinemas/{cinema_name}",
                "/cinemas/{$example_cinema_name}",
                'Individual cinema information',
            ],
            [
                '/movies',
                '/movies',
                'List of all movies'
            ],
            [
                '/movies/{movie_name}',
                "/movies/{$example_movie_name}",
                'Individual movie information'
            ],
            [
                '/sessions',
                '/sessions',
                'All sessions'
            ],
            [
                '/sessions{cinema_id}',
                "/sessions/{$random_cinema->id}",
                "All sessions for cinema id {$random_cinema->id}",
            ],
            [
                '/sessions/{cinema_id}/{movie_id}',
                "/sessions/{$random_cinema->id}/1",
                "All sessions for cinema id {$random_cinema->id} and movie id 1"
            ],
            [
                '/sessions/any/{movie_id}',
                "/sessions/any/{$random_movie->id}",
                "All sessions for a specific movie id"
            ]
        ];
    
        return view('welcome', [
            'cinema_count' => $cinema_count,
            'movie_count' => $movie_count,
            'sessiontime_count' => SessionTime::count(),
            'endpoints' => $example_endpoints
        ]);
    }
}
