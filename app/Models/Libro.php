<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'isbn',
        'descripcion',
        'archivo_pdf',
        'portada',
        'categoria',
        'nivel_educativo',
        'disponibilidad',
        'fecha_publicacion',
        'estado'
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
    ];

    public function materias()
    {
        return $this->belongsToMany(Materia::class);
    }

    public function estudiantesQueLoLeyeron()
    {
        return $this->belongsToMany(Estudiante::class, 'lectura_libro')->withPivot('fecha_lectura', 'completado');
    }

    public function estudiantesFavoritos()
    {
        return $this->belongsToMany(Estudiante::class, 'libro_favorito');
    }
}