<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;

    public function sessions()
    {
        return $this->hasMany('App\SessionTime')->orderby('datetime');
    }
}
