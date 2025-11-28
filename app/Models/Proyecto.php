<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'objetivos',
        'materia_id',
        'docente_id',
        'fecha_inicio',
        'fecha_entrega',
        'rubrica_evaluacion',
        'tipo',
        'recursos_necesarios',
        'requiere_presentacion',
        'estado'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_entrega' => 'date',
        'objetivos' => 'array',
        'recursos_necesarios' => 'array',
        'requiere_presentacion' => 'boolean',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function entregas()
    {
        return $this->hasMany(EntregaProyecto::class);
    }

    public function trabajosGrupales()
    {
        return $this->hasMany(TrabajoGrupal::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'evaluacion_id')->where('tipo_evaluacion', 'proyecto');
    }
}