<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SessionTime as SessionTime;
use App\Http\Resources\SessionTimeCollection as SessionTimeCollection;

class SessionController extends Controller
{
    public function index(Request $request, $cinema_id = 'any', $movie_id = 'all') {
        $where = [];

        if (ctype_digit($cinema_id)) {
            $where[] = ['cinema_id', $cinema_id];
        }

        if (ctype_digit($movie_id)) {
            $where[] = ['movie_id', $movie_id];
        }

        $date = $request->json('date');
        if ($date !== null && preg_match("/^[0-9-]+$/", $date)) {
            $where[] = ['datetime','LIKE', $date . '%'];
        };

        if ($cinema_id === 'any' && $movie_id === 'all' && $where === []) {
            // show all sessions
            $sessions = SessionTime::orderby('datetime')->paginate();

            if ($sessions->count() == 0) {
                return response()->json(['error'=> 'No sessions found'], 404);
            }
        } else {
            // show specific sessions
            $sessions = SessionTime::where($where)->orderby('datetime')->paginate();
    
            if ($sessions->count() == 0) {
                return response()->json(['error'=> 'No sessions found'], 404);
            }
        }

        return new SessionTimeCollection($sessions);
    }
}
