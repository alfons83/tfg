<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'pattern_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     */

   /* public function patterns()
    {

        return $this->belongsToMany('App\Models\patterns\Pattern' ,'patterns');
    }*/
}
