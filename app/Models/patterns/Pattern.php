<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

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
    //protected $fillable = ['name', 'description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     *
     * */

    protected $hidden = [];


    public function tags()
    {
        return $this->hasMany('App\Models\patterns\Tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\patterns\Category',  'id', 'pattern_id');
    }

    public function categorys()
    {
        return $this->hasMany('App\Models\patterns\Category', 'pattern_id');
    }

    public function cate()
    {
        return $this->hasOne('App\Models\patterns\Category');
    }


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


    public function count(Request $request)
    {
        return Pattern::count($request['id']);
    }

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
    }


}
