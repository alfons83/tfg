<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'active','user_id','pattern_id'];

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
