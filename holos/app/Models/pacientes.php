<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    protected $table = 'pacientes';
    protected $fillable = ['dni', 'nombresapellidos', 'dirrecion'];
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    use HasFactory;
}
