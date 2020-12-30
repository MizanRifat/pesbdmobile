<?php

namespace App\Repositories;

use App\Model\Fixture;
use App\Repositories\Traits\BaseRepository;
use App\Repositories\Traits\CreateFixtureRepo;
use Illuminate\Support\Facades\DB;

class FixtureRepository
{

    use BaseRepository;
    use CreateFixtureRepo;

    protected $model;

    private $tournamentRepo;

    public function __construct() {
        $this->model = new Fixture();
        $this->tournamentRepo = new TournamentRepository();

    }

    public function getClubFixtures($club_id,$tournament_id,$completed = 0,$withResult=false){

        $fixtures = $this->model
                    ->where(function($query) use($club_id){
                        $query->where('team1_id',$club_id)
                            ->orWhere('team2_id',$club_id);
                    })
                    ->where('tournament_id',$tournament_id)
                    ->where('completed',$completed)
                    ->when($withResult,function($q){
                        return $q->with('result');
                    })
                    ->get();
        
        return $fixtures;
    }

    public function getClubHomeFixtures($club_id,$tournament_id,$completed = 0){

        $fixtures = $this->model
                    ->where('team1_id',$club_id)
                    ->where('tournament_id',$tournament_id)
                    ->where('completed',$completed)
                    ->get();
        
        return $fixtures;
    }
    
    public function getClubAwayFixtures($club_id,$tournament_id,$completed = 0){

        $fixtures = $this->model
                    ->where('team2_id',$club_id)
                    ->where('tournament_id',$tournament_id)
                    ->where('completed',$completed)
                    ->get();
        
        return $fixtures;
    }

    

    public function addFixture($request){

        $request['group_'] = $request['group'];

        unset($request['group']);

       $validatedData = $request->validate([
           'team1_id' => ['required','integer'],
           'team2_id' => ['required','integer','different:team1_id'],
           'tournament_id' => ['required','integer'],
           'date' => ['date','nullable'],
           'group_' => ['integer','nullable'],
           'round' => ['required','integer'],
           'leg' => ['required','integer'],
       ]);   

       $fixture = $this->model->create($validatedData);

       $fixture->load(['team1','team2']);

       return $fixture;
   }
   public function updateFixture($request,$fixture){

        $request['group_'] = $request['group'];

        unset($request['group']);


       $validatedData = $request->validate([
           'id' => ['required','integer'],
           'team1_id' => ['integer'],
           'team2_id' => ['integer','different:team1_id'],
           'date' => ['date','nullable'],
           'group_' => ['integer','nullable'],
           'round' => ['integer'],
           'leg' => ['integer'],
       ]);   

       $fixture->update($validatedData);

       return $fixture;
   }

    
    
}
