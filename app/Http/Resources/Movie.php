<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // if you don't want the sessions display, uncomment this line.
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,

            'sessions' => $this->sessions
        ];
    }
}
