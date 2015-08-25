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
        return $this->belongsToMany('App\Models\pattern\Tag', 'tags');
    }

    public function author()
    {
        return $this->hasOne('App\Models\User' , 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\pattern\Comment');
    }

    public function votes()
    {
        return $this->belongsToMany('App\Models\User','patterns_votes');
    }

    public function getOpenAttribute()
    {
        return $this->status == 'open';
    }
}
