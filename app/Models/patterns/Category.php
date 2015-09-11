<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'pattern_categories';

    protected $fillable = ['id','name', 'description'];


    public function subcategories()
    {

        return $this->hasMany('App\Models\patterns\SubCategory');
    }
}
