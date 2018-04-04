<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    protected $withCount = ['comments'];

    protected $casts = [
        'published_at' => 'date',
    ];

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

        // We only index the author name
        // because we need it to build our view.
        // It's not used for relevancy
        $record['author_name'] = $this->author->name;

        // We also index a date formatted per month
        // to use in our custom ranking.
        // The format is chosen in order to create many ties.
        // Read: https://www.algolia.com/doc/guides/ranking/ranking-formula/#ranking
        $record['date_yymm'] = $this->published_at->format('ym');

        return $record;
    }
}
