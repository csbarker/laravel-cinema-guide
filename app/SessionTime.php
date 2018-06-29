<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionTime extends Model
{
    public $timestamps = false;

    /**
     * Get the movie associated with the session time.
     */
    public function movie()
    {
        return $this->hasOne('App\Movie');
    }

    /**
     * Get the cinema associated with the session time.
     */
    public function cinema()
    {
        return $this->hasOne('App\Cinema');
    }
}
