<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $withCount = ['comments'];

    protected $casts = [
        'nb_views' => 'int',
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

    public function shouldBeSearchable()
    {
        return $this->published;
    }

    public function toSearchableArray()
    {
        $record = $this->toArray();

        // Make sure comments_count is converted to an int
        // for better ranking performance since it's used in
        // the custom ranking formula.
        $record['comments_count'] = (int) $record['comments_count'];

        // We only index the author name
        // because we need it to build our view.
        // It's not used for relevancy
        $record['author_name'] = $this->author->name;

        // We also index a date formatted per month
        // to use in our custom ranking.
        // The format is chosen in order to create many ties.
        // Read: https://www.algolia.com/doc/guides/ranking/ranking-formula/#ranking
        $record['date_yymm'] = (int) $this->published_at->format('ym');

        // Remove unused attributes
        // nor for relevancy, nor for frontend UI (see http://community.algolia.com/instantsearch.js/)
        unset($record['created_at'], $record['author_id']);

        return $record;
    }
}
