<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SessionTimeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($sessiontime){
                return [
                    'id' => $sessiontime->id,
                    'datetime' => $sessiontime->datetime,
                    'movie' => $sessiontime->movie,
                    'cinema' => $sessiontime->cinema
                ];
            }),
        ];
    }
}
