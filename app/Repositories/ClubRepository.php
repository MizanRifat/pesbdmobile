<?php

namespace App\Repositories;

use App\Http\Resources\ClubResource;
use App\Model\Club;
use App\Model\Player;
use App\Notifications\ClubApproved;
use App\Repositories\Traits\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class ClubRepository
{

    use BaseRepository;

    protected $model;

    public function __construct() {
        $this->model = new Club();
    }

    public function updateClub($request,$club){

        $initApproved = $club->approved;

        $validatedData = $request->validate([

            'name' => ['max:20','min:2',Rule::unique('clubs')->ignore($club)],
            'owner_id' => [Rule::unique('clubs')->ignore($club),'regex:/^\d{3}-\d{3}-\d{3}$/'],
            'model_id'=>['numeric','exists:club_models,id'],
            'approved'=>['numeric'],

        ]);
        $validatedData['slug'] = str_replace(' ','',(strtolower($validatedData['name'])));

        $club->update($validatedData);

        if(isset($validatedData['approved']) && $validatedData['approved'] == 1 && $initApproved != $club->approved){
            Notification::send($club->owner,new ClubApproved($club->name,$club->slug));
        }

        return $this->model->find($club->id);
    }

    public function createClub($request){
        $validatedData = $request->validate([
            'name' => ['required','max:20','min:2','unique:clubs,name,','regex:/[a-zA-Z][a-zA-Z ]+/'],
            'owner_id' => ['required','string','regex:/^\d{3}-\d{3}-\d{3}$/','unique:clubs,owner_id'],
            'model_id'=>['required','numeric'],
        ]);
        $validatedData['slug'] = str_replace(' ','',(strtolower($validatedData['name'])));
        $validatedData['owner_user_id'] = Auth::id();

        $club = $this->model->create($validatedData);

        return $club;
    }
    
    
}
