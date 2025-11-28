<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Docente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'email',
        'telefono',
        'direccion',
        'foto_perfil',
        'especialidad',
        'titulo_profesional',
        'estado',
        'fecha_contratacion',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'fecha_contratacion' => 'date',
        'password' => 'hashed',
    ];

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }

    public function cursos()
    {
        return $this->hasManyThrough(Curso::class, Materia::class);
    }

    public function colegio()
    {
        return $this->hasOneThroughMany(Colegio::class, [Materia::class, Curso::class]);
    }

    public function estudiantes()
    {
        return $this->hasManyThroughMany(Estudiante::class, [Materia::class, Curso::class]);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function examenes()
    {
        return $this->hasMany(Examen::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}