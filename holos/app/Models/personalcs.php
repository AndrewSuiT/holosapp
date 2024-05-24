<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalcs extends Model
{
    protected $table = 'personalcs';
    protected $fillable = ['No', 'APELLIDOSYNOMBRES', 'NOMBRESYAPELLIDOS','APELLIDOPATERNO','APELLIDOMATERNO','NOMBRE_1','NOMBRE_2','NOMBRE_3','APELLIDOSCOMPLETOS','NOMBRESCOMPLETOS','DNI','DNI_TEXTO','CODIGO_DE_MARCACION','FECHA_NAC','FECHA_NAC_ANO','FECHA_NAC_MES','FECHA_NAC_DIA','EDAD','SEXO','PROFESION','COLEGIO','N_DE_COLEGIATURA','ESPECIALIDAD_RNE','CONDICION','CENTRO_LABORAL','REMU','TELEFONO','CORREO_ELECTRONICO','FECHA_INGRESO','NACIONALIDAD'];
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
