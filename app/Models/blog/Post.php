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

    protected $fillable = ['title', 'content' ,'active', 'user_id'];

    protected $dates = ['published_at'];

    protected $hidden = ['slug'];

    /**
     * The many-to-many relationship between posts and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\blog\Tag', 'blog_tags');
    }

    public function author()
    {
        return $this->hasOne('App\Models\User' , 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\blog\Comment');
    }


// /*   /**
//     * Set the title attribute and automatically the slug
//     *
//     * @param string $value
//     */
//    public function setTitleAttribute($value)
//    {
//        $this->attributes['title'] = $value;
//
//        if (! $this->exists) {
//            $this->setUniqueSlug($value, '');
//        }
//    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);

        if( ! $this->slug)
        {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

//    /**
//     * Recursive routine to set a unique slug
//     *
//     * @param string $title
//     * @param mixed $extra
//     */
//    protected function setUniqueSlug($title, $extra)
//    {
//        $slug = str_slug($title.'-'.$extra);
//
//        if (static::whereSlug($slug)->exists()) {
//            $this->setUniqueSlug($title, $extra + 1);
//            return;
//        }
//
//        $this->attributes['slug'] = $slug;
//    }

    /**
     * Return URL to post
     *
     * @param Tag $tag
     * @return string
     */
    public function url(Tag $tag = null)
    {
        $url = url('blog/'.$this->slug);
        if ($tag) {
            $url .= '?tag='.urlencode($tag->tag);
        }
        return $url;
    }


    /**
     * Return the date portion of published_at
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('M-j-Y');
    }

    /**
     * Return the time portion of published_at
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }

    /**
     * Return next post after this one or null
     *
     * @param Tag $tag
     * @return Post
     */
    public function newerPost(Tag $tag = null)
    {
        $query =
            static::where('published_at', '>', $this->published_at)
                ->where('published_at', '<=', Carbon::now())
                ->where('is_draft', 0)
                ->orderBy('published_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }
        return $query->first();
    }
    /**
     * Return older post before this one or null
     *
     * @param Tag $tag
     * @return Post
     */
    public function olderPost(Tag $tag = null)
    {
        $query =
            static::where('published_at', '<', $this->published_at)
                ->where('is_draft', 0)
                ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }
        return $query->first();
    }


}
