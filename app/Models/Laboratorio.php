<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'capacidad',
        'estado',
        'encargado',
        'imagen' // Optional for cover
    ];

    // Optional: If we want to relate to reservations later
    // public function reservas() { ... }
}
