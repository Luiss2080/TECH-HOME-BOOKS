<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'tipo',
        'titulo',
        'descripcion',
        'fecha_emision',
        'año_lectivo',
        'curso_completado',
        'promedio_final',
        'codigo_verificacion',
        'archivo_pdf',
        'firma_digital',
        'estado'
    ];

    protected $casts = [
        'fecha_emision' => 'date',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_completado');
    }
}