<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Favoritable;

    /**
     * A post can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
