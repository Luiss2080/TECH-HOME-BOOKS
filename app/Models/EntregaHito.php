<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaHito extends Model
{
    use HasFactory;

    protected $table = 'entregas_hitos';

    protected $fillable = [
        'hito_proyecto_id',
        'estudiante_id',
        'trabajo_grupal_id',
        'archivo_entrega',
        'descripcion',
        'fecha_entrega',
        'calificacion',
        'observaciones',
        'estado'
    ];

    protected $casts = [
        'fecha_entrega' => 'datetime',
    ];

    public function hitoProyecto()
    {
        return $this->belongsTo(HitoProyecto::class);
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