<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'descripcion',
        'es_sistema',
        'activo',
        'configuracion_adicional',
    ];

    protected $casts = [
        'es_sistema' => 'boolean',
        'activo' => 'boolean',
        'configuracion_adicional' => 'array',
    ];

    /**
     * Relación con usuarios que tienen este rol
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'usuario_roles', 'rol_id', 'user_id')
            ->withPivot(['colegio_id', 'fecha_asignacion', 'fecha_expiracion', 'activo', 'observaciones'])
            ->withTimestamps();
    }

    /**
     * Relación con permisos de este rol
     */
    public function permisos(): BelongsToMany
    {
        return $this->belongsToMany(Permiso::class, 'rol_permisos', 'rol_id', 'permiso_id')
            ->withPivot(['permitir', 'condiciones'])
            ->withTimestamps();
    }

    /**
     * Relación directa con rol_permisos
     */
    public function rolPermisos(): HasMany
    {
        return $this->hasMany(RolPermiso::class, 'rol_id');
    }

    /**
     * Verificar si el rol tiene un permiso específico
     */
    public function tienePermiso(string $nombrePermiso): bool
    {
        return $this->permisos()->where('nombre', $nombrePermiso)->where('permitir', true)->exists();
    }

    /**
     * Scope para roles activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para roles del sistema (no editables)
     */
    public function scopeSistema($query)
    {
        return $query->where('es_sistema', true);
    }

    /**
     * Scope para roles personalizados (editables)
     */
    public function scopePersonalizados($query)
    {
        return $query->where('es_sistema', false);
    }
}