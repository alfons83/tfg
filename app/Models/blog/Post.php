<?php

namespace App\Models\blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title', 'content','slug' ,'active', 'user_id'];

    protected $dates = ['published_at'];

    /**
     * The many-to-many relationship between posts and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\blog\Tag', 'tags');
    }

    public function author()
    {
        return $this->hasOne('App\Models\User' , 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\blog\Comment');
    }



    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

}
