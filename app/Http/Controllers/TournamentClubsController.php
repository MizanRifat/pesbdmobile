<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubResource;
use App\Model\Club;
use App\Model\Tournament;
use App\Notifications\AddedInTournament;
use App\Repositories\ClubRepository;
use App\Repositories\TournamentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class TournamentClubsController extends Controller
{

    protected $tournamentRepo;
    protected $clubRepo;

    public function __construct(TournamentRepository $tournamentRepo,ClubRepository $clubRepo) {
 
        $this->tournamentRepo = $tournamentRepo;
        $this->clubRepo = $clubRepo;
    }

    public function index(Tournament $tournament){
        $with = ['details'];

        if(isset(request()->owner)){
            array_push($with,'owner');
        }

        $clubs = $tournament
                ->clubs()
                ->with($with)
                ->get();

        return ClubResource::collection($clubs);
    }

    public function addClubInTournament(Request $request){


        $validatedData = $request->validate([
            'club_id' => ['required','integer',
                            Rule::unique('club_tournament')->where(function ($query) use($request){
                                return $query->where('tournament_id', $request['tournament_id']);
                            })            
                        ],
            'tournament_id' => ['required','integer'],
        ]);

        $tournament = $this->tournamentRepo->findOrFail($validatedData['tournament_id']);
        $club = $this->clubRepo->with('owner')->findOrFail($validatedData['club_id']);

        $tournament->clubs()->attach($validatedData['club_id']);

        Notification::send($club->owner,new AddedInTournament($tournament->name,$club->name));

        
        return response()->json([
            'message'=>'Club Added Successfully',
            'data'=>new ClubResource($club)
        ],200);

    }
    public function removeClubFromTournament(Request $request){


        $validatedData = $request->validate([
            'club_id' => ['required','integer'],
            'tournament_id' => ['required','integer'],
        ]);

        $tournament = $this->tournamentRepo->findOrFail($validatedData['tournament_id']);
        $tournament->clubs()->detach($validatedData['club_id']);

        return response()->json([
            'message'=>'Club Removed Successfully',
            'data'=>['club_id'=>$validatedData['club_id']]
        ],200);

    }
}
