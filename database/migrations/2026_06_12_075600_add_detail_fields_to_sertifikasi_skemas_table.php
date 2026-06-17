<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sertifikasi_skemas', function (Blueprint $table) {
            $table->string('metode_pelaksanaan')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->integer('jumlah_unit')->default(0);
            $table->json('units')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('sertifikasi_skemas', function (Blueprint $table) {
            $table->dropColumn(['metode_pelaksanaan', 'masa_berlaku', 'jumlah_unit', 'units']);
        });
    }
};
