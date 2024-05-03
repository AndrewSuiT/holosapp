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
        Schema::create('cie10hais', function (Blueprint $table) {
            $table->id();
            $table->string('CIE10_X')->nullable();
            $table->string('CIE10')->nullable();
            $table->string('descripcion_CIE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cie10hais');
    }
};
