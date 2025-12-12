<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Docente extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'docentes';

    protected $fillable = [
        'user_id',
        'colegio_id',
        'codigo_docente',
        'especialidad',
        'titulo_profesional',
        'experiencia',
        'tipo_contrato',
        'fecha_contratacion',
        'estado_laboral',
        'salario',
        'observaciones'
    ];

    protected $casts = [
        'fecha_contratacion' => 'date',
        'salario' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'docente_materia');
    }

    public function cursos()
    {
        return $this->hasManyThrough(Curso::class, Materia::class);
    }

    public function estudiantes()
    {
        // Esta relación es compleja y depende de cómo se estructure la relación docente-materia-curso-estudiante
         return $this->hasManyThroughMany(Estudiante::class, [Materia::class, Curso::class]);
    }
}