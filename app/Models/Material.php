<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiales';

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'archivo',
        'materia_id',
        'docente_id',
        'curso_destinatario',
        'fecha_publicacion',
        'etiquetas',
        'estado'
    ];

    protected $casts = [
        'fecha_publicacion' => 'datetime',
        'etiquetas' => 'array',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_destinatario');
    }
}