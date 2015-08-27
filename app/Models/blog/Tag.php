<?php

namespace App\Models\blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_tags';

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
     */

    public function posts()
    {
        return $this->belongsToMany('App\Models\blog\Post', 'blog_post');
    }

    /**
     * Return the index layout to use for a tag
     *
     * @param string $tag
     * @param string $default
     * @return string
     */
    public static function layout($tag, $default = 'blog.index')
    {
        $layout = static::whereTag($tag)->pluck('layout');
        return $layout ?: $default;
    }
}
