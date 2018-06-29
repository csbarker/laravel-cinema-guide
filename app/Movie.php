<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;

    /**
     * Get the movie associated with the session time.
     */
    public function sessions()
    {
        return $this->hasMany('App\SessionTime');
    }
}
