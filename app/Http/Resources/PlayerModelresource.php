<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerModelresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $types = ['','black','gold','silver','white'];

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'model_id'=>$this->model_id,
            'position'=>$this->position,
            'type'=>$this->type,
            'players_count'=>$this->players_count,
            'image'=>asset('/images/players/'.$this->image)
        ];
    }
}
