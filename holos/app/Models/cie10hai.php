<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cie10hai extends Model
{
    protected $table = 'cie10hais';
    protected $fillable = ['CIE10_X', 'CIE10', 'descripcion_CIE'];
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
