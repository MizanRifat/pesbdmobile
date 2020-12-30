<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class GinfoController extends Controller
{
    public function index(){
        return response()->json([
            'data'=> Cache::get('info')
        ]);
        
    }

    public function update(Request $request){

        if(Gate::authorize('update_ginfo')){

            $validatedData = $request->validate([
                'season'=>['regex:/^[a-zA-Z]{3}[0-9]{2}$/'],
                'pre_season'=>Rule::in(['true', 'false'])
            ]);
    
            
            Cache::put('info',[
                'season'=>$validatedData['season'],
                'pre_season'=>$validatedData['pre_season'] == 'true' ? true : false
            ]);
            return response()->json([
                'data'=> Cache::get('info'),
                'message'=>'Update Successfull'
            ]);
        }

    }
}
