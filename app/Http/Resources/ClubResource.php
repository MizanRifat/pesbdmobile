<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
            'name'=>$this->name,
            'slug'=>$this->slug,
            'club_model'=>$this->details->name,
            'club_model_id'=>$this->details->id,
            'logo'=>asset('/images/club_logo/'.$this->details->logo),
            // 'logo'=>asset('/images/logo/'.$this->logo),
            'establishedIn'=>$this->created_at,
            'owner_id'=>$this->owner_id,
            'owner'=>new UserResource($this->whenLoaded('owner')),
            'approved'=>$this->approved,
            'tournaments'=> TournamentResource::collection($this->whenLoaded('tournaments')),
            'players'=> PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
}
