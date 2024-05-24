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
            $table->string('n_hc');
            $table->string('apellidosynombres');
            $table->string('edad');
            $table->string('g');
            $table->string('p');
            $table->string('a');
            $table->string('hijos_vivos');
            $table->string('hijos_fallec');
            $table->string('edad_gestacion');
            $table->string('n_control');
            $table->string('domicilio');
            $table->datetime('fechahora_parto');
            $table->string('tipo_parto');
            $table->string('duracion_parto1');
            $table->string('duracion_parto2');
            $table->string('duracion_parto3');
            $table->string('episotonia');
            $table->string('sexo');
            $table->string('peso_rn');
            $table->string('apgar1');
            $table->string('apgar5');
            $table->string('talla');
            $table->string('p_cefalico');
            $table->string('p_toraxico');
            $table->string('p_abdominal');
            $table->string('h_cl_rn');
            $table->string('medico_encargado');
            $table->string('observaciones');
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
