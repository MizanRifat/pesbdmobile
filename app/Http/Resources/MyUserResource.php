<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id' => $this->user_id,
            'name' => $this->whenLoaded('details',$this->details['name']),
            'email' => $this->whenLoaded('details',$this->details['email']),
            'password' => $this->password,
        ];
    }
}
