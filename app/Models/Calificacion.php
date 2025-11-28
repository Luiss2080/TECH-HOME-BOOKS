<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificaciones';

    protected $fillable = [
        'estudiante_id',
        'materia_id',
        'docente_id',
        'tipo_evaluacion',
        'evaluacion_id',
        'nota',
        'puntuacion_maxima',
        'fecha_evaluacion',
        'observaciones',
        'periodo_academico'
    ];

    protected $casts = [
        'fecha_evaluacion' => 'date',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function evaluacion()
    {
        switch ($this->tipo_evaluacion) {
            case 'tarea':
                return $this->belongsTo(Tarea::class, 'evaluacion_id');
            case 'examen':
                return $this->belongsTo(Examen::class, 'evaluacion_id');
            case 'proyecto':
                return $this->belongsTo(Proyecto::class, 'evaluacion_id');
            default:
                return null;
        }
    }
}