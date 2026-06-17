<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table): void {
            $table->id();
            $table->string('badge_text')->default('Lembaga Resmi Terakreditasi BNSP');
            $table->string('headline');
            $table->text('subheadline')->nullable();
            $table->string('btn_primary_text')->nullable();
            $table->string('btn_primary_url')->nullable();
            $table->string('btn_secondary_text')->nullable();
            $table->string('btn_secondary_url')->nullable();
            $table->string('stat_1_value')->nullable();
            $table->string('stat_1_label')->nullable();
            $table->string('stat_2_value')->nullable();
            $table->string('stat_2_label')->nullable();
            $table->string('stat_3_value')->nullable();
            $table->string('stat_3_label')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
