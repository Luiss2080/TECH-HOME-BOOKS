<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoGrupal extends Model
{
    use HasFactory;

    protected $table = 'trabajos_grupales';

    protected $fillable = [
        'nombre_grupo',
        'proyecto_id',
        'lider_id',
        'descripcion',
        'fecha_creacion',
        'estado'
    ];

    protected $casts = [
        'fecha_creacion' => 'date',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function lider()
    {
        return $this->belongsTo(Estudiante::class, 'lider_id');
    }

    public function integrantes()
    {
        return $this->belongsToMany(Estudiante::class, 'trabajo_grupal_estudiante');
    }

    public function entregas()
    {
        return $this->hasMany(EntregaProyecto::class);
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioGrupo::class);
    }
}