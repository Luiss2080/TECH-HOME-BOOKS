<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examenes';

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'materia_id',
        'docente_id',
        'fecha_hora',
        'duracion',
        'puntuacion_total',
        'instrucciones',
        'modalidad',
        'estado'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'evaluacion_id')->where('tipo_evaluacion', 'examen');
    }

    public function preguntas()
    {
        return $this->hasMany(PreguntaExamen::class);
    }
}