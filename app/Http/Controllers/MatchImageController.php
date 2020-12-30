<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatchImageResource;
use App\Model\Fixture;
use App\Model\MatchImage;
use App\Repositories\ResultRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MatchImageController extends Controller
{
    protected $resultRepo;

    public function __construct(ResultRepository $resultRepo) {
        $this->resultRepo = $resultRepo;
    }


    public function addImages(Request $request){

        $fixture = Fixture::findOrFail($request->fixture_id);

        if(Gate::authorize('update_result',$fixture)){
            
            $images = $this->resultRepo->addImages($request);
            
            if($images){
                $images = Fixture::findOrFail($request['fixture_id'])->images;
                return response()->json([
                    'message'=>'Image uploaded',
                    'data'=>MatchImageResource::collection($images)
                ],200);
            }else{
                return response()->json([
                    'message'=>'Image not uploaded',
                ],500);
        }
    }
    }

    public function removeImage(MatchImage $image){

        $fixture = Fixture::findOrFail($image->fixture_id);

        if(Gate::authorize('update_result',$fixture)){

            $delete = $image->delete();

            if($delete){
                return response()->json([
                    'data'=>$image->id,
                    'message' => 'Image removed successfully.',
                ],200);
                }else{
                    return response()->json([
                        'message' => 'Image not removed.',
                    ],500);
                }
        }
    }
}
