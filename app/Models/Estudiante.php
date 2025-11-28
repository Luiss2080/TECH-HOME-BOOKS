<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Estudiante extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'fecha_nacimiento',
        'email',
        'telefono',
        'direccion',
        'foto_perfil',
        'curso_id',
        'tutor_nombre',
        'tutor_telefono',
        'tutor_email',
        'estado',
        'fecha_inscripcion',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_inscripcion' => 'date',
        'password' => 'hashed',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function colegio()
    {
        return $this->hasOneThrough(Colegio::class, Curso::class);
    }

    public function materias()
    {
        return $this->hasManyThrough(Materia::class, Curso::class);
    }

    public function tareas()
    {
        return $this->hasManyThrough(Tarea::class, Materia::class);
    }

    public function entregas()
    {
        return $this->hasMany(EntregaTarea::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function trabajosGrupales()
    {
        return $this->belongsToMany(TrabajoGrupal::class, 'trabajo_grupal_estudiante');
    }

    public function librosLeidos()
    {
        return $this->belongsToMany(Libro::class, 'lectura_libro')->withPivot('fecha_lectura', 'completado');
    }

    public function librosFavoritos()
    {
        return $this->belongsToMany(Libro::class, 'libro_favorito');
    }
}