<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubModelResource;
use App\Model\ClubModel;
use App\Repositories\ClubModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClubModelController extends Controller
{

    protected $clubModelRepo;

    public function __construct(ClubModelRepository $clubModelRepo) {

        $this->clubModelRepo = $clubModelRepo;
    
    }


    public function index(){
       $clubModels = $this->clubModelRepo->all();

        return ClubModelResource::collection($clubModels);
    }

    public function search(Request $request){

        $data =$this->clubModelRepo->search($request);
        
        return response()->json([
            'data' => $data->map(function($item){
                $item->logo = asset('/images/teams/'.sprintf("%06d",$item->model_id).'.png');
                return $item;
            }),
        ]);
    }

    public function store(Request $request){

        $club = $this->clubModelRepo->create($request);

        return response()->json([
            'data' => new ClubModelresource($club),
            'message'=> 'Club Model Added.'
        ]);
    }

    public function update(Request $request,ClubModel $clubModel){

        
       $updatedClubModel = $this->clubModelRepo->update($request,$clubModel);

        return response()->json([
            'data'=>new ClubModelResource($updatedClubModel),
            'message' => 'Club updated successfully.',
        ],200);
    }

    public function destroy(ClubModel $clubModel){
        $delete = $clubModel->delete();

        Storage::delete('/club_logo/'.$clubModel->logo);

        if($delete){
            return response()->json([
                'data'=>$clubModel->id,
                'message' => 'Club removed successfully.',
            ],200);
            }else{
                return response()->json([
                    'message' => 'Club not removed.',
                ],500);
            }
    }
}
