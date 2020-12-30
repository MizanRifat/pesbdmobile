<?php

use App\Http\Resources\MyUserResource;
use App\Model\MyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


Route::get('/tournaments','TournamentController@index');
Route::group(['prefix'=>'tournament'],function(){

    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
            
        Route::post('/create','TournamentController@create'); 
        Route::delete('/{tournament}','TournamentController@destroy'); 
        Route::put('/{tournament}','TournamentController@update');

        
    });
    Route::post('/fixtures/create/{tournament}','TournamentFixturesController@create'); 
    Route::get('/{ref}','TournamentController@show'); 

    Route::get('/players/stats/{tournament_id}','TournamentStatsController@getPlayerStats');
    Route::get('/standings/{tournament_id}','TournamentStatsController@getPoinTable');
    Route::get('/groups/{tournament_id}','TournamentStatsController@getTournamentGroups');
    Route::get('/results/{tournament_id}','TournamentStatsController@getTournamentResults');

    Route::get('/clubs/{tournament}','TournamentClubsController@index');
    Route::get('/officials/{tournament_id}','TournamentOfficialsController@index'); 
Route::get('/fixtures/{tournament_id}','TournamentFixturesController@index');
    
});
Route::group(['prefix'=>'tournament/club'],function(){
    
    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
        Route::post('/add','TournamentClubsController@addClubInTournament');
        Route::post('/remove','TournamentClubsController@removeClubFromTournament');
    });

});

Route::group(['prefix'=>'tournament/officials'],function(){
    
    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
        Route::post('/add','TournamentOfficialsController@addOfficial');
        Route::post('/remove','TournamentOfficialsController@removeOfficial');
    });

});

Route::group(['prefix'=>'fixture'],function(){
    
    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
        Route::post('/','FixtureController@add'); 
        Route::delete('/{fixture}','FixtureController@destroy'); 
        Route::put('/{fixture_id}','FixtureController@update'); 
    });

    Route::get('/{fixture_id}','FixtureController@show');
    Route::get('/details/{fixture_id}','FixtureController@getFixtureDetails');  
    
});

// Route::get('/club/fixtures','FixtureController@getFixturesByClub'); // ?club_id,tournament_id
// Route::get('/club/fixtures/home','FixtureController@getClubHomeFixtures'); // ?club_id,tournament_id
// Route::get('/club/fixtures/away','FixtureController@getClubAwayFixtures'); // ?club_id,tournament_id

Route::get('/clubs','ClubController@index');

Route::group(['prefix'=>'club'],function(){

    Route::get('/search','ClubController@search');
    Route::get('/{ref}','ClubController@show');                 
    Route::post('/','ClubController@create');  
    Route::put('/{club}','ClubController@update'); 
    Route::put('/approve/request/{club}','ClubController@sendApproveRequest'); 
    Route::put('/approve/{club}','ClubController@approveClub');

});

Route::get('/clubmodels','ClubModelController@index');

Route::group(['prefix'=>'clubmodel'],function(){

    Route::get('/search','ClubModelController@search');

    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
        Route::post('/','ClubModelController@store');  
        Route::put('/{clubModel}','ClubModelController@update');  
        Route::delete('/{clubModel}','ClubModelController@destroy');   
        
    });
});

Route::group(['prefix'=>'player'],function(){
    Route::post('/','PlayerController@addPlayer');  
    Route::put('/{player_id}','PlayerController@updatePlayer');  
    Route::delete('/{player}','PlayerController@removePlayer');
    Route::get('/search','PlayerController@search');   
    
});

Route::get('/playermodels','PlayerModelController@index');
Route::post('/pminsert','PlayerModelController@insert');

Route::group(['prefix'=>'playermodel'],function(){

    Route::get('/search','PlayerController@search');
    
    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
      
        Route::post('/','PlayerModelController@store');  
        Route::put('/{playerModel}','PlayerModelController@update');  
        Route::delete('/{playerModel}','PlayerModelController@destroy');
    });
});

Route::group(['prefix'=>'result'],function(){

    Route::get('/{fixture_id}','ResultController@show');

    Route::group(['middleware'=>'auth:sanctum_user'],function(){
        Route::put('/submit/{fixture_id}','ResultController@submit'); 
        Route::put('/approve/{fixture_id}','ResultController@approveResult');
        Route::post('/reject','ResultController@rejectResult'); 
        
    });

    
    Route::group(['prefix'=>'event'],function(){
        Route::put('/{event}','MatchEventController@update'); 
        Route::post('/','MatchEventController@create'); 
        Route::delete('/{event}','MatchEventController@delete'); 
    });
    Route::group(['prefix'=>'rating'],function(){

        Route::put('/{rating}','MatchRatingController@update'); 
        Route::post('/','MatchRatingController@create'); 
        Route::delete('/{rating}','MatchRatingController@delete'); 
    });
    Route::group(['prefix'=>'image'],function(){
        
        Route::post('/','MatchImageController@addImages'); 
        Route::delete('/{image}','MatchImageController@removeImage'); 
    });
});

Route::get('/users','UserController@index'); 

Route::group(['prefix'=>'user'],function(){

    Route::group(['middleware'=>'auth:sanctum_user'],function(){
        Route::get('/','UserController@getCurrentUser');
    });
    Route::get('/search','UserController@search');  
    Route::get('/{id}','UserController@show');
    Route::put('/{user}','UserController@update'); 
    Route::delete('/{user}','UserController@destroy'); 
});


Route::get('/notifications','NotificationController@index')->middleware('auth:sanctum_admin'); 
Route::group(['prefix'=>'notification'],function(){
    Route::put('/markasread/{id}','NotificationController@notificationMarkAsRead'); 
    Route::put('/markasunread/{id}','NotificationController@notificationMarkAsUnRead'); 
    Route::delete('/{id}','NotificationController@destroy'); 

});

Route::group(['prefix'=>'ginfo'],function(){
   
    Route::post('/update','GinfoController@update'); 
    Route::get('/','GinfoController@index'); 
    Route::get('/init',function(Request $request){
        Cache::put('info',[
            'season'=>'Oct20',
            'pre_season'=>false
        ]);
    })
    // ->middleware('auth:sanctum_admin')
    ; 

});

Route::group(['prefix'=>'admin'],function(){

    Route::group(['middleware'=>'auth:sanctum_admin'],function(){
        Route::get('/', 'AdminController@getCurrentAdmin');
    });
    Route::group(['middleware'=>'adminGuard'],function(){
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/logout', 'Auth\LoginController@logout');

    });
});


Route::get('/myusers',function(Request $request){
    $users = MyUser::with('details')->get();

    return MyUserResource::collection($users);
})->middleware('auth:sanctum_admin');



Route::get('/clear-cache', function() {
    return $exitCode = Artisan::call('cache:clear');
 });
  
Broadcast::routes();