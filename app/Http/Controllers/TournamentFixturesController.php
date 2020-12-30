<?php

namespace App\Http\Controllers;

use App\Http\Resources\FixtureResource;
use App\Model\Tournament;
use App\Repositories\FixtureRepository;
use App\Repositories\TournamentRepository;
use Illuminate\Http\Request;

class TournamentFixturesController extends Controller
{
    protected $fixtureRepo;
    protected $tournamentRepo;

    public function __construct(FixtureRepository $fixtureRepo,TournamentRepository $tournamentRepo) {
        $this->fixtureRepo = $fixtureRepo;
        $this->tournamentRepo = $tournamentRepo;
    }

    public function index($tournament_id){

        $with = [];

        if(isset(request()['teamdetails'])){
            $with= ['team1','team2'];
        }
        $fixtures = $this->tournamentRepo
                    ->findOrFail($tournament_id)
                    ->fixtures()
                    ->where('completed','!=',1)
                    ->with($with)
                    ->get();

        return FixtureResource::collection($fixtures);
    }

    public function create(Request $request,Tournament $tournament){
        
        $tournament_id = $tournament->id;
        $tournament_leg = $tournament->leg;
        $tournament_round = $tournament->round;


        $clubIds = $tournament->clubs->pluck('id');

        switch ($tournament->type) {
            case 1:

                $this->fixtureRepo->createRoundRobinFixtures($tournament_id,$clubIds,$tournament_leg);
                
            break;

            case 2:
                
                $this->fixtureRepo->createKnockoutFixtures($tournament_id,$clubIds,$tournament_round,$tournament_leg,true);

            break;
            case 3:
                
                $this->fixtureRepo->createRRKFixture($tournament_id,$tournament_leg,);

            break;
            
            default:
                
                break;
        }


        $request->merge(["teamdetails"=>1]);

        return response()->json([
            'data' => $this->index($tournament_id),
            'message'=>'Fixtures Created Successfully.'
        ]);

    }
}
