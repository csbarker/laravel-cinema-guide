<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cinema as Cinema;
use App\Http\Resources\Cinema as CinemaResource;
use App\Http\Resources\CinemaCollection as CinemaCollection;

class CinemaController extends Controller
{
    public function index() {
        return new CinemaCollection(Cinema::paginate());
    }

    public function resource(Request $request, $name = null) {
        $cinema = Cinema::where('name', $name);
    
        $date = $request->json('date');
        if ($date !== null && preg_match("/^[0-9-]+$/", $date)) {
            $cinema = $cinema->whereHas('sessions', function($query) use ($date) {
                $query->where('datetime','LIKE', $date . '%');
            });
        };
    
        $cinema = $cinema->first();
    
        if ($cinema !== null) {
            return new CinemaResource($cinema);
        }
        
        return response()->json(['error'=> 'No results found'], 404);
    }
}
