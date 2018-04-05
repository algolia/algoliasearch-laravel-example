<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Comment extends Model
{
    use Searchable;
    use SoftDeletes;

    /**
     * Every time a new comment is added or an existing
     * comment is updated, Laravel will update the `updated_at`
     * attributes of the parent posts.
     * This will trigger the reindex of this post in Algolia.
     *
     * To test it, use `php artisan demo:edit:new-comment {postId}`
     */
    protected $touches = ['post'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function shouldBeSearchable()
    {
        return !$this->trashed();
    }
}
