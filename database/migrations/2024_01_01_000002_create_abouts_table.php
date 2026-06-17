<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table): void {
            $table->id();
            $table->string('label')->nullable();
            $table->string('heading');
            $table->text('description');
            $table->json('highlights')->nullable();
            $table->string('image')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_content')->nullable();
            $table->string('mission_title')->nullable();
            $table->json('mission_items')->nullable();
            $table->string('history_title')->nullable();
            $table->text('history_content')->nullable();
            $table->json('values')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
