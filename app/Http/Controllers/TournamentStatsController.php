<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubResource;
use App\Http\Resources\FixtureResource;
use App\Http\Resources\MatchResultResource;
use App\Http\Resources\OfficialResource;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\TournamentResource;
use App\Model\Fixture;
use App\Model\Tournament;
use App\Repositories\OfficialRepository;
use App\Repositories\TournamentRepository;
use Illuminate\Http\Request;

class TournamentStatsController extends Controller
{

    protected $tournamentRepo;
    protected $officialRepo;

    public function __construct(TournamentRepository $tournamentRepo,OfficialRepository $officialRepo) {
 
        $this->tournamentRepo = $tournamentRepo;
        $this->officialRepo = $officialRepo;
    }

    public function getPoinTable($tournament_id){
        $pointTable = $this->tournamentRepo->getTournamentPointsTable($tournament_id);
        return response()->json([
            'data'=>$pointTable
        ]);
    }


    public function getPlayerStats($tournament_id){
        $stats = $this->tournamentRepo->getstats($tournament_id);
        request()->merge(['stats'=>1]);
        
        return response()->json([
            'data'=>PlayerResource::collection($stats)
        ]);
    }


    public function getTournamentGroups($tournament_id){
        return $this->tournamentRepo->getTournamentGroups($tournament_id)->map(function($group){
            return ClubResource::collection($group);
        });
    }

    public function getTournamentResults($tournament_id){

        $with =['team1','team2','result'];
        
        $results = $this->tournamentRepo->findOrFail($tournament_id)
                    ->fixtures()
                    ->where('completed',1)
                    ->with($with)
                    ->get();

        return ResultResource::collection($results);
    }
    



}
