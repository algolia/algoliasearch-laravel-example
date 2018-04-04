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
}
