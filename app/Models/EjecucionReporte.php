<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjecucionReporte extends Model
{
    use HasFactory;

    protected $table = 'ejecuciones_reportes';

    protected $fillable = [
        'reporte_id',
        'usuario_id',
        'parametros_utilizados',
        'fecha_ejecucion',
        'archivo_generado',
        'estado',
        'tiempo_ejecucion',
        'registros_procesados',
        'errores'
    ];

    protected $casts = [
        'parametros_utilizados' => 'array',
        'fecha_ejecucion' => 'datetime',
        'errores' => 'array'
    ];

    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}