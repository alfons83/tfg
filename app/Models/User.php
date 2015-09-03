<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Request;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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
    protected $fillable = ['username','firstName','lastName', 'email', 'password', 'type', 'active'];

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


    public function profile()
    {
        return $this->hasOne('App\Models\User_profile');
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }




    public function count(Request $request)

    {
        return User::count($request['id'],'active', 1);
    }

    /*public function active(Request $request, $result)
    {
        $result = \DB::table('users')
            ->select('email')
            ->where('active', true)
            ->get();
    }*/


    function currentUser()
    {
        return auth()->user();
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

 /*   public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }*/
    public function scopeName($query, $name)
    {
        if (trim($name) != "")
        {
            $query->where('full_name', "LIKE", "%$name%");
        }
    }

    public function scopeType($query, $type)
    {
        $types = config('options.types');
        if ($type != "" && isset($types[$type]))
        {
            $query->where('type', $type);
        }
    }

    public function is($type)
    {
        return $this->type === $type;
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

}
