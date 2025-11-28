<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'logo',
        'direccion',
        'telefono',
        'email',
        'director',
        'estado',
        'niveles_educativos',
        'año_lectivo_actual'
    ];

    protected $casts = [
        'niveles_educativos' => 'array'
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function estudiantes()
    {
        return $this->hasManyThrough(Estudiante::class, Curso::class);
    }

    public function docentes()
    {
        return $this->hasManyThrough(Docente::class, Curso::class);
    }
}