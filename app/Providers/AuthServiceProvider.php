<?php

namespace App\Providers;

use App\Model\Club;
use App\Model\Fixture;
use App\Model\Official;
use App\Model\Player;
use App\Model\Tournament;
use App\Policies\ClubPolicy;
use App\Policies\FixturePolicy;
use App\Policies\PlayerPolicy;
use App\Policies\TournamentPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        User::class => UserPolicy::class,
        Player::class => PlayerPolicy::class,
        Club::class => ClubPolicy::class,
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update_result', function ($user,$fixture) {
            if(Auth::guard('admin')->check()){
                return true;
            }
            if($fixture->completed == 1){
                return false;
            }
            if($fixture->team1_id == $user->club['id'] || $fixture->team2_id == $user->club['id']){
                return true;
            }

            return false;
            
        });
        
        Gate::define('update_notification', function ($user,$notification) {

            if(Auth::guard('admin')->check()){
                return true;
            }
            if($notification->notifiable_type == 'App\User' && $user->id == $notification->notifiable_id ){
                return true;
            }

            return false;
            
        });
        
        Gate::define('is_official', function ($user,$tournament_id) {
            if(Official::where('tournament_id',$tournament_id)->where('user_id',$user->id)->exists()){
                return true;
            }
            return false;
        }); 

        Gate::define('approve_result', function ($user,$fixture) {

            $is_official = Official::where('tournament_id',$fixture->tournament_id)->where('user_id',$user->id)->exists();
            $own_match = $fixture->team1_id == $user->id || $fixture->team1_id == $user->id;

             if($is_official && !$own_match){
                return true;
            }
            return false;
        });
        
        Gate::define('update_ginfo', function ($user) {
            return Auth::guard('admin')->check();
        });
    }
}
