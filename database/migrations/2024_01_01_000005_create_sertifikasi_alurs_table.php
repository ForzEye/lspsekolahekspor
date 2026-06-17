<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sertifikasi_alurs', function (Blueprint $table): void {
            $table->id();
            $table->enum('type', ['tatap_muka', 'jarak_jauh'])->default('tatap_muka');
            $table->integer('step_number');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('extra_label')->nullable();
            $table->text('extra_content')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sertifikasi_alurs');
    }
};
