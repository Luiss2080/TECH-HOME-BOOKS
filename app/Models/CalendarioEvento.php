<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioEvento extends Model
{
    use HasFactory;

    protected $table = 'calendario_eventos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo_evento',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'ubicacion',
        'colegio_id',
        'curso_id',
        'materia_id',
        'docente_id',
        'color',
        'publico',
        'recordatorio',
        'estado'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i',
        'publico' => 'boolean',
        'recordatorio' => 'boolean'
    ];

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}