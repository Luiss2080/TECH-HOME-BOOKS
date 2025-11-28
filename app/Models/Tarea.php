<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'materia_id',
        'docente_id',
        'fecha_publicacion',
        'fecha_entrega',
        'puntuacion_maxima',
        'archivo_instrucciones',
        'estado'
    ];

    protected $casts = [
        'fecha_publicacion' => 'datetime',
        'fecha_entrega' => 'datetime',
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
        return $this->hasMany(EntregaTarea::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'evaluacion_id')->where('tipo_evaluacion', 'tarea');
    }
}