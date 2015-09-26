<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path','gender','bio','birthdate', 'twitter', 'website', 'user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     *
     */

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->birthdate)->age;
    }
}

