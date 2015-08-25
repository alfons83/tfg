<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'type', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the Complete Name for the user.
     *
     * @return string
     */

    public function posts()

    {
        return $this->hasMany('App\Models\blog\Post');
    }

    public function patterns()
    {
        return $this->hasMany('App\Models\patterns\Pattern');
    }



    public function voted()
    {
        return $this->belongsToMany('App\Models\patterns\Pattern', 'pattern_votes')->withTimestamps();
    }

    public function hasVoted(Pattern $pattern)
    {
        return $this->voted()->where('pattern_id', $pattern->id)->count();
    }


    public function getFullNameAttribute()

    {
        return $this->first_name . '' . $this->last_name;
    }


    /**
     * Get the password for the user.
     *
     * @return string
     */


    public function getAuthPassword()

    {
        return $this->password;
    }

    /**
     * Set the password for the user.
     *
     * @return string
     */
    /*
        public function setPasswordAttribute($value)

        {
            if(! empty ($value))
            {
                $this->attributes['password'] = bcrypt($value);

            }
        }
    */


    public function is($type)
    {
        return $this->type === $type;
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

}
