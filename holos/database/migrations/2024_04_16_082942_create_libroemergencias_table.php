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
        Schema::create('libroemergencias', function (Blueprint $table) {
            $table->id();
            $table->integer('DNI')->nullable();
            $table->date('FICHAFAM')->nullable();
            $table->string('NHCL')->nullable();
            $table->string('CODSIS')->nullable();
            $table->string('PLAN')->nullable();
            $table->string('SERV')->nullable();
            $table->string('EMERGENCIA')->nullable();
            $table->string('APELLIDOSYNOMBRES')->nullable();
            $table->string('NCR')->nullable();
            $table->integer('EDAD')->nullable();
            $table->string('SEXO')->nullable();
            $table->string('DIRECCIÓN')->nullable();
            $table->string('DIAGNOSTICO')->nullable();
            $table->string('PDR')->nullable();
            $table->string('TRATAMIENTO')->nullable();
            $table->string('INYECT')->nullable();
            $table->string('CURAC')->nullable();
            $table->string('RESPONSABLE')->nullable();
            $table->string('OBSERV')->nullable();
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libroemergencias');
    }
};
