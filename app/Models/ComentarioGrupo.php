<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioGrupo extends Model
{
    use HasFactory;

    protected $table = 'comentarios_grupos';

    protected $fillable = [
        'trabajo_grupal_id',
        'estudiante_id',
        'comentario',
        'fecha_comentario'
    ];

    protected $casts = [
        'fecha_comentario' => 'datetime',
    ];

    public function trabajoGrupal()
    {
        return $this->belongsTo(TrabajoGrupal::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}