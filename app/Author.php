<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Author extends Model
{
    use Searchable;

    protected $casts = [
        'is_guest' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getScoutKey()
    {
        /*
         * For author, we're using the email address as the
         * Algolia objectID. This allows you to retrieve an author like:
         * `app(\AlgoliaSearch\Client::class)->initIndex($author->searchableAs())->getObject($author->email);`.
         */
        return $this->email;
    }

    public static function boot()
    {
        parent::boot();

        /**
         * This will keep the `author_name` attribute updated
         * in posts if the author is updated.
         * Note that the Laravel "touch" feature only works
         * with BelongsTo relationships (see Comment class)
         *
         * To test it, use `php artisan demo:edit:author-name {id} {newName}`
         *
         * Note that this is not triggered by `scout:import` because when
         * importing, models are not modified.
         */
        static::saved(function ($model) {
            $model->posts->filter(function ($item) {
                return $item->shouldBeSearchable();
            })->searchable();
        });
    }
}
