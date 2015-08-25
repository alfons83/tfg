<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_votes';

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
    protected $hidden = ['password', 'remember_token'];
     */

    public function pattern()
    {
        return $this->belongsTo('App\Models\patterns\Pattern');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
