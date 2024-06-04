<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anexo extends Model
{
    use HasFactory;
    protected $table = 'anexos';

    protected $fillable = ['nroAnexo','descAnexo'];
    protected $hidden = [
        'obsvAnexo',
        'created_at',
        'updated_at'
    ];
}
