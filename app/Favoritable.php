<?php

namespace App;

trait Favoritable
{
    /**
     * Fetch all favorites for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    /**
     * Scope a query to records favorited by the given user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  User                                  $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFavoritedBy($query, User $user)
    {
        return $query->whereHas('favorites', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    /**
     * Determine if the model is favorited by the given user.
     *
     * @param  User $user
     * @return boolean
     */
    public function isFavoritedBy(User $user)
    {
        return $this->favorites()
            ->where('user_id', $user->id)
            ->exists();
    }

    /**
     * Have the authenticated user favorite the model.
     *
     * @return void
     */
    public function favorite()
    {
        $this->favorites()->save(
            new Favorite(['user_id' => auth()->id()])
        );
    }
}

