<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'horas_semanales',
        'curso_id'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function docentes()
    {
        return $this->hasMany(Docente::class);
    }

    public function estudiantes()
    {
        return $this->hasManyThrough(Estudiante::class, Curso::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function examenes()
    {
        return $this->hasMany(Examen::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }
}