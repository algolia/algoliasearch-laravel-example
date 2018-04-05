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
        return $this->email;
    }

    public static function boot()
    {
        /**
         * This will keep the `author_name` attribute updated
         * in posts if the author is updated.
         * Note that the Laravel "touch" feature only works
         * with BelongsTo relationships (see Comment class)
         *
         * To test it, use `php artisan demo:edit:author-name {id} {newName}`
         */
        static::saved(function ($model) {
            $model->posts->filter(function ($item) {
                return $item->shouldBeSearchable();
            })->searchable();
        });
    }
}
