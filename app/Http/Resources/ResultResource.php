<?php

namespace App\Http\Resources;

use App\Model\Club;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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

            'id' => $this->id,
            'team1_id'=>$this->team1_id,
            'team2_id'=>$this->team2_id,
            'team1_details' => new ClubResource($this->whenLoaded('team1')),
            'team2_details' => new ClubResource($this->whenLoaded('team2')),
            'date'=>$this->date === null ? 'N/A' : date("Y-m-d\TH:i:s", strtotime($this->date)),
            'tournament_id'=>$this->tournament_id,
            'group'=>$this->group_,
            'round'=>$this->round,
            'leg'=>$this->leg,
            'completed'=>$this->completed,
            'team1_goals'=>$this->result->team1_goals,
            'team2_goals'=>$this->result->team2_goals,
            'approved_by'=>$this->result->approved_by
            // 'approved_by'=>new UserResource($this->result->approved_by)
           
        ];
    }
}
