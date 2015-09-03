<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User_profile extends Model
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
    protected $fillable = ['bio','birthdate', 'twitter', 'website'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     *
     */

    protected $hidden = [];


    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->birthdate)->age;
    }
}

