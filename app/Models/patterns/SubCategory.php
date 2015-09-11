<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_subcategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name', 'description', 'category_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     *
     */

    public function categories()
    {

        return $this->belongsTo('App\Models\patterns\Category' ,'category_id');
    }
}
