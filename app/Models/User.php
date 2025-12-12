<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password',
        'ci',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'avatar',
        'rol',
        'estado',
        'configuracion_notificaciones',
        'ultimo_acceso',
        'biografia',
        'genero',
        'profesion',
        'nivel_estudios',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'fecha_nacimiento' => 'date',
            'configuracion_notificaciones' => 'array',
            'ultimo_acceso' => 'datetime',
        ];
    }

    /**
     * Relación con roles personalizados
     */
    public function rolesPersonalizados()
    {
        return $this->belongsToMany(Role::class, 'usuario_roles', 'user_id', 'rol_id')
            ->withPivot(['colegio_id', 'fecha_asignacion', 'fecha_expiracion', 'activo', 'observaciones'])
            ->withTimestamps();
    }

    /**
     * Relación con docente (si aplica)
     */
    public function docente()
    {
        return $this->hasOne(Docente::class, 'user_id');
    }

    /**
     * Relación con estudiante (si aplica)
     */
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'user_id');
    }

    /**
     * Relación con notificaciones recibidas
     */
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'user_id')->latest();
    }

    /**
     * Relación con notificaciones enviadas
     */
    public function notificacionesEnviadas()
    {
        return $this->hasMany(Notificacion::class, 'emisor_id')->latest();
    }

    /**
     * Verificar si el usuario tiene un permiso específico
     */
    public function tienePermiso(string $nombrePermiso, $colegioId = null): bool
    {
        // Verificar permisos por rol del sistema
        if ($this->rol === 'admin') {
            return true;
        }

        // Verificar permisos por roles personalizados
        $rolesActivos = $this->rolesPersonalizados()
            ->wherePivot('activo', true)
            ->when($colegioId, function ($query) use ($colegioId) {
                return $query->where('colegio_id', $colegioId);
            })
            ->get();

        foreach ($rolesActivos as $rol) {
            if ($rol->tienePermiso($nombrePermiso)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Obtener notificaciones no leídas
     */
    public function notificacionesNoLeidas()
    {
        return $this->notificaciones()->noLeidas()->vigentes();
    }

    /**
     * Contar notificaciones no leídas
     */
    public function contarNotificacionesNoLeidas(): int
    {
        return $this->notificacionesNoLeidas()->count();
    }

    /**
     * Verificar si es administrador
     */
    public function esAdministrador(): bool
    {
        return $this->rol === 'admin';
    }

    /**
     * Verificar si es docente
     */
    public function esDocente(): bool
    {
        return $this->rol === 'docente';
    }

    /**
     * Verificar si es estudiante
     */
    public function esEstudiante(): bool
    {
        return $this->rol === 'estudiante';
    }

    /**
     * Obtener el nombre completo
     */
    public function getNombreCompletoAttribute(): string
    {
        return trim($this->name . ' ' . $this->apellido);
    }

    /**
     * Scope para usuarios activos
     */
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    /**
     * Scope por rol
     */
    public function scopePorRol($query, string $rol)
    {
        return $query->where('rol', $rol);
    }
}
