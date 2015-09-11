<?php

namespace App\Models\patterns;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Pattern extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patterns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content','path','slug','active','status','user_id','subcategory_id','rule_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     *
     * */


    public function setPathAttribute($path)
    {
        if(!empty($path)){
            $title = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $title;
            \Storage::disk('local')->put($title, \File::get($path));
        }
    }

    public function photos()
    {
        return $this->hasMany('App\Models\patterns\Photos');
    }



    public function rulesNielsen()
    {
        return $this->hasMany('App\Models\patterns\RulesNielsen');
    }

  /*  public function categories()
    {
        return $this->belongsToMany('App\Models\patterns\Category',  'id', 'pattern_id');
    }*/

    public function categories()
    {
        return $this->hasMany('App\Models\patterns\Category');
    }

 /*   public function cate()
    {
        return $this->hasOne('App\Models\patterns\Category');
    }*/


    public function author()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\patterns\Comment');
    }

    public function voters()
    {
        return $this->belongsToMany('App\Models\User','pattern_votes')->withTimestamps();
    }


/*
    public function favourites()
    {
        return $this->belongsToMany('App\Models\patterns\patterns', 'pattern_votes','pattern_id', 'user_id');
    }

    public function addFavourites($pattern)
    {
        $this->favourites()->attach($pattern->id);
    }

    public function removeFavourites($pattern)
    {
        $this->favourites()->detach($pattern->id);
    }*/


}
