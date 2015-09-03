<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'description', 'post_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
    protected $hidden = ['password', 'remember_token'];
     */

    /*public function patterns()
    {

        return $this->belongsToMany('App\Models\patterns\Pattern','patterns');
    }*/
}
