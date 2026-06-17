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
        Schema::table('sebaran_pesertas', function (Blueprint $table) {
            $table->dropColumn(['x_coordinate', 'y_coordinate']);
            $table->decimal('latitude', 10, 6)->after('nama_wilayah');
            $table->decimal('longitude', 10, 6)->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sebaran_pesertas', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
            $table->decimal('x_coordinate', 5, 2)->after('nama_wilayah');
            $table->decimal('y_coordinate', 5, 2)->after('x_coordinate');
        });
    }
};
