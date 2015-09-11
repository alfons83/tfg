<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path', 'pattern_id'];


    public function pattern()
    {
        return $this->belongsTo('App\Models\patterns\Pattern');
    }

}