<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    protected $withCount = ['comments'];

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

    public function toSearchableArray()
    {
        $record = $this->toArray();

        // Customize $record here

        return $record;
    }
}
