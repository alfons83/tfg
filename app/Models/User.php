<?php

namespace App\Models;


use Carbon\Carbon;
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
    protected $fillable = ['username','first_name','last_name', 'email', 'password', 'type', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get the Complete Name for the user.
     *
     * @return string
     */

    public function setPathAttribute($path)
    {
        if(!empty($path)){
            $title = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $title;
            \Storage::disk('local')->put($title, \File::get($path));
        }
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
        return $this->hasOne('App\Models\UserProfile','user_id');
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }




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


    public function is($type)
    {
        return $this->type === $type;
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

}
