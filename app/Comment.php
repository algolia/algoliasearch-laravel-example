<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Comment extends Model
{
    use Searchable;
    use SoftDeletes;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function shouldBeSearchable()
    {
        return !$this->trashed();
    }
}
