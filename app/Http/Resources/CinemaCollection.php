<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CinemaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // if you don't want the sessions display, uncomment this line.
        //return parent::toArray($request);

        return [
            'data' => $this->collection->transform(function($cinema){
                return [
                    'id' => $cinema->id,
                    'name' => $cinema->name,
                    'address' => $cinema->address,
                    'latitude' => $cinema->latitude,
                    'longitude' => $cinema->longitude,

                    'sessions' => $cinema->sessions
                ];
            }),
        ];
    }
}
