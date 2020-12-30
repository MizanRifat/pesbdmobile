<?php

namespace App\Model;
use App\Http\Support\Database\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class MatchResult extends Model
{
    use CacheQueryBuilder;

    public function fixture(){
        return $this->belongsTo('App\Model\Fixture');
    }
    public function events(){
        return $this->hasManyThrough('App\Model\MatchEvent','App\Model\Fixture','id','fixture_id');
    }
    public function ratings(){
        return $this->hasManyThrough('App\Model\MatchRating','App\Model\Fixture','id','fixture_id');
    }

    public function approved_by(){
        return $this->hasOne('App\User','id','approved_by');
    }

}
