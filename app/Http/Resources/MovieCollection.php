<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($movie){
                return [
                    'id' => $movie->id,
                    'name' => $movie->name,

                    'sessions' => $movie->sessions
                ];
            }),
        ];
    }
}
