<?php

namespace App\Models\blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_comments';

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

    public function post()
    {
        return $this->belongsTo('App\Models\blog\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
