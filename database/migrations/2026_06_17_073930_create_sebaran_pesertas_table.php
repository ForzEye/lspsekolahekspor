<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sebaran_pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wilayah');
            $table->decimal('x_coordinate', 5, 2);
            $table->decimal('y_coordinate', 5, 2);
            $table->integer('jumlah_peserta')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sebaran_pesertas');
    }
};
