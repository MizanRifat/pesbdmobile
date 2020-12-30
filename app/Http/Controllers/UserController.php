<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function index(){
        $users = $this->userRepo->with('club')->get();
        return UserResource::collection($users);
    }

    public function getCurrentUser(){
      
        $user = $this->userRepo->getCurrentUser();
        return new UserResource($user);
    
    }
    
    public function show($id){
        $user = $this->userRepo->with('club.players')->findOrFail($id);
        return new UserResource($user);
    }

    public function update(Request $request,User $user){

        $this->authorize('update',$user);

        $updatedUser = $this->userRepo->updateUser($request,$user);

        return response()->json([
            'message'=>'Update Successfull',
            'data'=>new UserResource($updatedUser)
        ],200);
        
    }


    public function destroy(User $user){

        $this->authorize('delete',$user);

        $delete = $user->delete();

        if($delete){
            return response()->json([
                'message' => 'User removed successfully.',
                'data'=>$user->id
            ],200);
        }else{
            return response()->json([
                'message' => 'User not removed.',
            ],500);
        }
    }

    public function search(Request $request){

        $users = $this->userRepo->search($request);

        return UserResource::collection($users);
    }

  


}
