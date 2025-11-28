<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permisos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'modulo',
        'accion',
        'recurso',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    /**
     * Relación con roles que tienen este permiso
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'rol_permisos', 'permiso_id', 'rol_id')
            ->withPivot(['permitir', 'condiciones'])
            ->withTimestamps();
    }

    /**
     * Relación directa con rol_permisos
     */
    public function rolPermisos(): HasMany
    {
        return $this->hasMany(RolPermiso::class, 'permiso_id');
    }

    /**
     * Scope para permisos activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para permisos por módulo
     */
    public function scopePorModulo($query, string $modulo)
    {
        return $query->where('modulo', $modulo);
    }

    /**
     * Scope para permisos por acción
     */
    public function scopePorAccion($query, string $accion)
    {
        return $query->where('accion', $accion);
    }

    /**
     * Obtener permisos agrupados por módulo
     */
    public static function agrupadosPorModulo()
    {
        return self::activos()->get()->groupBy('modulo');
    }
}