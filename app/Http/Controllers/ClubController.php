<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubResource;
use App\Http\Resources\PlayerResource;
use App\Model\Admin;
use App\Model\Club;
use App\Model\ClubModel;
use App\Notifications\ClubApprovalRequest;
use App\Notifications\ClubApproved;
use App\Repositories\ClubModelRepository;
use App\Repositories\ClubRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ClubController extends Controller
{

    protected $clubRepo;
    protected $clubModelRepo;

    public function __construct(ClubRepository $clubRepo,ClubModelRepository $clubModelRepo) {
        $this->clubRepo = $clubRepo;
        $this->clubModelRepo = $clubModelRepo;
    }

    public function index(){

        $clubs = $this->clubRepo->with('owner','tournaments')->get();

        return ClubResource::collection($clubs);
    }

    public function show($ref){
        $with = ['owner','players','tournaments'];

        $club = $this->clubRepo
                ->where('id',$ref)
                ->orWhere('slug',$ref)
                ->with($with)
                ->firstOrFail();
                
        return new ClubResource($club);
    }

    public function search(Request $request){
        return ClubResource::collection($this->clubRepo->search($request));
    }

    public function update(Request $request,Club $club){
        $this->authorize('update',$club);

        $updatedClub = $this->clubRepo->updateClub($request,$club);
       
        return response()->json([
            'message' => 'Updated Successfully.',
            'data'=> new ClubResource($updatedClub)
        ],200);
    }

    public function create(Request $request){

        $this->authorize('create',Club::class);

        $club = $this->clubRepo->createClub($request);
       
        return response()->json([
            'message' => 'Club Created',
            'data'=> new ClubResource($club)
        ],200);
    }

    public function sendApproveRequest(Club $club){
        $this->authorize('approve_request',$club);

        if($club->approved != 0){
            abort(403,'Club is already approved.');
        }
        if($club->players->count() < 18){
            abort(403,'Squad should have at least 18 players.');
        }

        $club->approved = 2;
        $club->save();

        Notification::send(Admin::all(),new ClubApprovalRequest($club->name,$club->owner->name));

        return response()->json([
            'message' => 'Request Sent',
            'data'=> ['approved'=>$club->approved]
        ],200);
    }

    public function approveClub(Club $club){

        $this->authorize('approve_club',$club);

        $club->approved = 1;
        $club->save();

        Notification::send($club->owner,new ClubApproved($club->name,$club->slug));

        return response()->json([
            'message' => 'Club Approved',
            'data'=> $club
        ],200);
        
    }
}
