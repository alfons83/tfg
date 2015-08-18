<?php

namespace App;

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
    protected $fillable = ['name', 'email', 'password','role','active'];

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

    public function profile()
    {
        return $this->hasOne('App\User_profile');
    }


    public function getFullNameAttribute()

    {
        return $this->name .'' .$this->name;
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

    public function setPasswordAttribute($value)

    {
        if(! empty ($value))
        {
            $this->attributes['password'] = bcrypt($value);

        }
    }


}
