<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $fillabel=[
        'nombre_pelicula',
        'descripcion_pelicula',
        'tipo_pelicula',
        'fecha_estreno_pelicula',
        'precio_pelicula'
    ];
    
}
