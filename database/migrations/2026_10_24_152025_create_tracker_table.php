<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tracker', function (Blueprint $table) {
            $table->id();
            $table->string('page', 255);
            $table->string('ip', 45);
            $table->string('method', 10)->default('GET');
            $table->unsignedSmallInteger('status')->default(200);
            $table->json('meta')->nullable();
            $table->timestamp('visited_at')->useCurrent();
            $table->index('page');
            $table->index('visited_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracker');
    }
};
