<?php

namespace App\Models\patterns;

use Illuminate\Database\Eloquent\Model;

class RulesNielsen extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pattern_rules_nielsen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'pattern_id'];




   public function pattern()
    {
        return $this->belongsTo('App\Models\patterns\Pattern' , 'rule_id');
    }
}
