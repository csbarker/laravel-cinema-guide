<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    public $timestamps = false;

    public function sessions()
    {
        return $this->hasMany('App\SessionTime');
    }
}
