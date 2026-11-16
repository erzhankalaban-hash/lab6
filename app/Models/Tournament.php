<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tournament extends Model
{
    protected $fillable = ['name', 'city', 'start_date'];

    protected $casts = ['start_date' => 'date'];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(
            Player::class,
            'player_tournament',
            'tournament_id',
            'player_id'
        );
    }
}
