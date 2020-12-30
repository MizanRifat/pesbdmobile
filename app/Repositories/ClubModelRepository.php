<?php

namespace App\Repositories;

use App\Model\ClubModel;
use App\Repositories\Traits\BaseRepository;
use Illuminate\Support\Facades\Validator;

class ClubModelRepository
{
    use BaseRepository;

    protected $model;

    public function __construct() {
        $this->model = new ClubModel();
    }

    public function create($request){

        $validatedRequest = $request->validate([
            'logo' => 'required | image | max:1000',
            'data' => 'required',
        ]);

        $data = json_decode($validatedRequest['data'], true);
        
        $rules = [
            'name'=>['required',],
            'model_id'=>['required','numeric',['numeric','unique:playermodels,id']],
        ];

        $validatedData = Validator::make($data, $rules)->validate();
        
        $validatedData['logo'] = $validatedRequest['logo']->hashName();

        $validatedRequest['logo']->storeAs('club_logo',$validatedData['logo']);

        $club = ClubModel::create($validatedData);

        return $club;
    }


    public function update($request,$clubModel){

        $validatedData = $request->validate([
            'name'=>['regex:/^[a-zA-Z ]+$/'],
            'model_id'=>['numeric',['numeric','unique:playermodels,id,'.$clubModel->id]],
        ]);

        $clubModel->update($validatedData);

        return $clubModel;
    }

    
}
