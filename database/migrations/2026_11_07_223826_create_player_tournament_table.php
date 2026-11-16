<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('player_tournament', function (Blueprint $table) {
            $table->foreignId('player_id')
                ->constrained('players')->cascadeOnDelete();
            $table->foreignId('tournament_id')
                ->constrained('tournaments')->cascadeOnDelete();
            $table->primary(['player_id', 'tournament_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('player_tournament');
    }
};
