<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libroemergencia extends Model
{
    use HasFactory;

    protected $fillable = ['DNI', 'FICHAFAM', 'NHCL', 'CODSIS', 'PLAN', 'SERV', 'EMERGENCIA', 'APELLIDOSYNOMBRES', 'NCR', 'EDAD', 'SEXO', 'DIRECCIÓN', 'DIAGNOSTICO', 'PDR', 'TRATAMIENTO', 'INYECT', 'CURAC', 'RESPONSABLE', 'OBSERV'];
}
