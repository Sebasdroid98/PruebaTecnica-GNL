<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    use HasFactory;
    
    protected $table = 'premios';

    protected $fillable = [
        'codigo',
        'nombre',
        'cantidad',
        'estado'
    ];
}
