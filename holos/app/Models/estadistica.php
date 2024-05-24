<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadistica extends Model
{
    use HasFactory;
    protected $table = 'estadisticas';

    protected $fillable = ['dni','nombre','fecha'];
}
