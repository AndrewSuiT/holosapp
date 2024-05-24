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
        Schema::create('personalcs', function (Blueprint $table) {
            $table->id();
            $table->integer('No')->nullable();
            $table->string('APELLIDOSYNOMBRES')->nullable();
            $table->string('NOMBRESYAPELLIDOS')->nullable();
            $table->string('APELLIDOPATERNO')->nullable();
            $table->string('APELLIDOMATERNO')->nullable();
            $table->string('NOMBRE_1')->nullable();
            $table->string('NOMBRE_2')->nullable();
            $table->string('NOMBRE_3')->nullable();
            $table->string('APELLIDOSCOMPLETOS')->nullable();
            $table->string('NOMBRESCOMPLETOS')->nullable();
            $table->integer('DNI')->nullable();
            $table->string('DNI_TEXTO')->nullable();
            $table->integer('CODIGO_DE_MARCACION')->nullable();
            $table->date('FECHA_NAC')->nullable();
            $table->integer('FECHA_NAC_ANO')->nullable();
            $table->integer('FECHA_NAC_MES')->nullable();
            $table->integer('FECHA_NAC_DIA')->nullable();
            $table->integer('EDAD')->nullable();
            $table->string('SEXO')->nullable();
            $table->string('PROFESION')->nullable();
            $table->string('COLEGIO')->nullable();
            $table->integer('N_DE_COLEGIATURA')->nullable();
            $table->string('ESPECIALIDAD_RNE')->nullable();
            $table->string('CONDICION')->nullable();
            $table->string('CENTRO_LABORAL')->nullable();
            $table->integer('REMU')->nullable();
            $table->integer('TELEFONO')->nullable();
            $table->string('CORREO_ELECTRONICO')->nullable();
            $table->date('FECHA_INGRESO')->nullable();
            $table->string('NACIONALIDAD')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalcs');
    }
};
