<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'birth_date',
        'phone',
        'country_code',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }

    public function tournaments(): BelongsToMany
    {
        return $this->belongsToMany(
            Tournament::class,
            'player_tournament',
            'player_id',
            'tournament_id'
        );
    }
}
