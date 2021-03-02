<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return[ 
            "id" => $this->id,
            "email" => $this->email,
            "sujet" => $this->sujet,
            "message" => $this->message,
            "user_id"=> $this->user_id
        ];
    }
}
