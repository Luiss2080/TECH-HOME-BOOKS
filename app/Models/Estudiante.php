<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'user_id',
        'colegio_id',
        'curso_id',
        'codigo_estudiante',
        'tutor_nombre',
        'tutor_telefono',
        'tutor_email',
        'estado_academico',
        'fecha_inscripcion',
        'observaciones',
        'historial_academico'
    ];

    protected $casts = [
        'fecha_inscripcion' => 'date',
        'historial_academico' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function entregas()
    {
        return $this->hasMany(EntregaTarea::class);
    }
}