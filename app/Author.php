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
}
