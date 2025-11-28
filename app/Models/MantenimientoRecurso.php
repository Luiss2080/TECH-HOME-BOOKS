<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoRecurso extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos_recursos';

    protected $fillable = [
        'recurso_educativo_id',
        'tipo_mantenimiento',
        'descripcion',
        'fecha_mantenimiento',
        'tecnico_responsable',
        'costo',
        'observaciones',
        'estado'
    ];

    protected $casts = [
        'fecha_mantenimiento' => 'date',
    ];

    public function recursoEducativo()
    {
        return $this->belongsTo(RecursoEducativo::class);
    }
}