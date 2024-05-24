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
        Schema::create('libroobstetricias', function (Blueprint $table) {
            $table->id();
            $table->string('n_hc')->nullable();
            $table->string('apellidosynombres')->nullable();
            $table->string('edad')->nullable();
            $table->string('g')->nullable();
            $table->string('p')->nullable();
            $table->string('a')->nullable();
            $table->string('hijos_vivos')->nullable();
            $table->string('hijos_fallec')->nullable();
            $table->string('edad_gestacion')->nullable();
            $table->string('n_control')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('fecha_parto')->nullable();
            $table->time('hora_parto')->nullable();
            $table->string('tipo_parto')->nullable();
            $table->string('duracion_parto1')->nullable();
            $table->string('duracion_parto2')->nullable();
            $table->string('duracion_parto3')->nullable();
            $table->string('episiotonia')->nullable();
            $table->string('sexo')->nullable();
            $table->string('peso_rn')->nullable();
            $table->string('apgar1')->nullable();
            $table->string('apgar5')->nullable();
            $table->string('talla')->nullable();
            $table->string('p_cefalico')->nullable();
            $table->string('p_toraxico')->nullable();
            $table->string('p_abdominal')->nullable();
            $table->string('h_cl_rn')->nullable();
            $table->string('encargado')->nullable();
            $table->string('medico_encargado')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libroobstetricias');
    }
};
