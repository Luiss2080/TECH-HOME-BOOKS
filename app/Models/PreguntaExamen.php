<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaExamen extends Model
{
    use HasFactory;

    protected $table = 'preguntas_examenes';

    protected $fillable = [
        'examen_id',
        'pregunta',
        'tipo_respuesta',
        'opciones',
        'respuesta_correcta',
        'puntuacion',
        'orden'
    ];

    protected $casts = [
        'opciones' => 'array',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}