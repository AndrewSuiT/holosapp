<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libroobstetricia extends Model
{
    use HasFactory;
    protected $fillable = ['n_hc','apellidosynombres','edad','g','p','a','hijos_vivos','hijosfallec','edad_gestacion','n_control','domicilio','fechahora_parto','tipo_parto','duracion_parto1','duracion_parto2','duracion_parto3','episotonia','sexo','peso_rn','apgar1','apgar5','talla','p_cefalico','p_toraxico','p_abdominal','h_cl_rn','medico_encargado','observaciones'];
}
