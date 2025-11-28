<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoEducativo extends Model
{
    use HasFactory;

    protected $table = 'recursos_educativos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_recurso',
        'codigo_inventario',
        'marca',
        'modelo',
        'serie',
        'estado_fisico',
        'estado_disponibilidad',
        'ubicacion',
        'colegio_id',
        'fecha_adquisicion',
        'costo',
        'observaciones'
    ];

    protected $casts = [
        'fecha_adquisicion' => 'date',
    ];

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    public function prestamos()
    {
        return $this->hasMany(PrestamoRecurso::class);
    }

    public function mantenimientos()
    {
        return $this->hasMany(MantenimientoRecurso::class);
    }
}