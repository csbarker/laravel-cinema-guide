<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie as Movie;
use App\Http\Resources\Movie as MovieResource;
use App\Http\Resources\MovieCollection as MovieCollection;

class MovieController extends Controller
{
    public function index(Request $request, $name = null) {
        return new MovieCollection(Movie::paginate());
    }

    public function resource(Request $request, $name = null) {    
        $movie = Movie::where('name', $name);
    
        $date = $request->json('date');
        if ($date !== null && preg_match("/^[0-9-]+$/", $date)) {
            $movie = $movie->whereHas('sessions', function($query) use ($date) {
                $query->where('datetime','LIKE', $date . '%');
            });
        };
    
        $movie = $movie->first();
    
        if ($movie !== null) {
            return new MovieResource($movie);
        }
        
        return Response::json(['error'=> 'No results found'], 404);
    }
}
