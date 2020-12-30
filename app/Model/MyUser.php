<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    protected $table = 'myusers';
    protected $guarded = [];
    public $timestamps = false;


    public function details(){
        return $this->hasOne('App\User','id','user_id');
    }
}
