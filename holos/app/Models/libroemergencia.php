<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class libroemergencia extends Model
{
    use HasFactory;
    protected $table = 'libroemergencias';

    protected $fillable = ['DNI', 'FICHAFAM', 'NHCL', 'CODSIS', 'PLAN', 'SERV', 'EMERGENCIA2', 'APELLIDOSYNOMBRES', 'NCR', 'EDAD', 'SEXO', 'DIRECCIÓN', 'diagnosticoId', 'PDR', 'TRATAMIENTO', 'INYECT', 'CURAC', 'RESPONSABLE', 'RESPONSABLE_MED', 'OBSERV'];

    function diagnostico() : BelongsTo {
        return $this->belongsTo(cie10hai::class, 'diagnosticoId');
    }
}
