<?php

namespace App\Http\Controllers;

use App\Http\Resources\FixtureResource;
use App\Http\Resources\MatchEventsResource;
use App\Http\Resources\MatchImageResource;
use App\Http\Resources\MatchRatingsResource;
use App\Model\Fixture;
use App\Model\Tournament;
use App\Repositories\FixtureRepository;
use App\Repositories\TournamentRepository;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    protected $fixtureRepo;
    protected $tournamentRepo;

    public function __construct(FixtureRepository $fixtureRepo,TournamentRepository $tournamentRepo) {
        $this->fixtureRepo = $fixtureRepo;
        $this->tournamentRepo = $tournamentRepo;
    }

    public function show(Request $request,$fixture_id){
        $with = ['team1','team2'];

        if($request['players']){
            $with = ['team1.players','team2.players'];    
        }

        $fixture = Fixture::with($with)->findOrFail($fixture_id);

        return new FixtureResource($fixture);
    }

    public function getFixtureDetails($fixture_id){
        
        $fixture = Fixture::with(['result',"events",'ratings','team1.players','team2.players','images'])->findOrFail($fixture_id);
        
        return response()->json([
            'data'=> [
                'fixture' => new FixtureResource($fixture),
                'events'=> MatchEventsResource::collection($fixture->events),
                'ratings' => MatchRatingsResource::collection($fixture->ratings),
                'images'=>MatchImageResource::collection($fixture->images)
            ]
        ]);

    }

    public function destroy(Fixture $fixture){
        $delete = $fixture->delete();

        if($delete){
            return response()->json([
                'message' => 'Fixtures  removed successfully.',
                'data'=>$fixture->id
            ],200);
        }else{
            return response()->json([
                'message' => 'Fixtures not deleted.',
            ],500);
        }
    }

    public function update(Request $request,$fixture_id){  
        
        $fixture = Fixture::with('team1','team2')->findOrFail($fixture_id);

        $fixture = $this->fixtureRepo->updateFixture($request,$fixture);
        
        return response()->json([
            'message'=>'Update Successfull',
            'data'=>new FixtureResource($fixture)
        ],200);
    }

    public function add(Request $request){  
        
        $fixture = $this->fixtureRepo->addFixture($request);
        
        return response()->json([
            'message'=>'Fixture Added.',
            'data'=>new FixtureResource($fixture)
        ],200);
    }

    


}
