<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    use HasFactory;

    protected $table = 'ufs'; // Define el nombre de la tabla de la base de datos asociada al modelo UF.

    protected $fillable = [ // Define los campos que se pueden asignar masivamente.
        'fecha', 
        'valor' 
    ];
}
