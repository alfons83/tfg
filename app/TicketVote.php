<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketVote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ticket_votes';

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
}
