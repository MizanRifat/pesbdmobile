<?php

namespace App\Repositories;

use App\Model\MyUser;
use App\Repositories\Traits\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    use BaseRepository;

    protected $model;

    public function __construct() {
        $this->model = new User();
    }

    public function getCurrentUser(){

        $user = $this->model->with('club','notifications')->findOrFail(Auth::id());
        
        return $user;
    }

    public function updateUser($request,$user){

        $user->load('club.details');

        $validatedData = $request->validate([
            'name' => ['max:20','min:2','regex:/^[a-zA-Z ]+$/'],
            'email' => ['email','unique:users,email,'.$user->id],
            'blocked' => ['boolean'],
            'old_password' => [
                'nullable', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
            'password' => ['nullable','confirmed','min:8'],
            'fbID'=>['nullable','unique:users,fbID,'.$user->id]
        ],
        [
            'fbID.unique' => 'The facebook id has already been taken.'
        ]);

        unset($validatedData['old_password']);

        if(isset($validatedData['password'])){
            MyUser::where('user_id',$user->id)->update(['password'=>$validatedData['password']]);
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return $user;
    }

    
}
