<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'colegio_id',
        'nivel',
        'grado',
        'seccion',
        'turno',
        'aula',
        'año_lectivo',
        'cupo_maximo',
        'estado'
    ];

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }

    public function docentes()
    {
        return $this->hasManyThrough(Docente::class, Materia::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}