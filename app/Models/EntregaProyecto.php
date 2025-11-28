<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaProyecto extends Model
{
    use HasFactory;

    protected $table = 'entregas_proyectos';

    protected $fillable = [
        'proyecto_id',
        'estudiante_id',
        'trabajo_grupal_id',
        'archivo_entrega',
        'descripcion',
        'fecha_entrega',
        'es_entrega_final',
        'estado',
        'calificacion',
        'observaciones_docente'
    ];

    protected $casts = [
        'fecha_entrega' => 'datetime',
        'es_entrega_final' => 'boolean',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function trabajoGrupal()
    {
        return $this->belongsTo(TrabajoGrupal::class);
    }
}