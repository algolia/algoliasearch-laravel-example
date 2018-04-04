<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Allow the use of `$this->published`
     *
     * @return bool
     */
    public function getPublishedAttribute()
    {
        return !is_null($this->published_at);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
