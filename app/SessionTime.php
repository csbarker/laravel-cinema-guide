<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionTime extends Model
{
    public $timestamps = false;

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function cinema()
    {
        return $this->belongsTo('App\Cinema');
    }
}
