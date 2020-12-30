<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{

    public function index(){
        return response()->json([
            'data' => DatabaseNotification::orderBy('created_at','desc')->get()
        ]);
    }
  
    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id); 

        if(Gate::authorize('update_notification',$notification)){
            $notification->delete();
            return response()->json([
                'data'=>$id,
                'message' => 'success',
            ],200);
        }
    }

    public function notificationMarkAsRead($id){
        $notification = DatabaseNotification::findOrFail($id); 

        if(Gate::authorize('update_notification',$notification)){
            $notification->markAsRead();
            return response()->json([
                'data'=>$id,
                'message' => 'success',
            ],200);
        }

    }
    public function notificationMarkAsUnRead($id){
        $notification = DatabaseNotification::findOrFail($id); 
        if(Gate::authorize('update_notification',$notification)){
            DatabaseNotification::findOrFail($id)->markAsUnRead();
            return response()->json([
                'data'=>$id,
                'message' => 'success',
            ],200);
        }
    }
  
}
