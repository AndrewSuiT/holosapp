<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class libroemergencia extends Model
{
    use HasFactory;

    protected $fillable = ['DNI', 'FICHAFAM', 'NHCL', 'CODSIS', 'PLAN', 'SERV', 'EMERGENCIA', 'APELLIDOSYNOMBRES', 'NCR', 'EDAD', 'SEXO', 'DIRECCIÓN', 'DIAGNOSTICO', 'PDR', 'TRATAMIENTO', 'INYECT', 'CURAC', 'RESPONSABLE', 'OBSERV'];

    function FECHASLIBRO() : BelongsTo {
        return $this->belongsTo(libroemergencia::class, 'FICHAFAM');
    }
}
