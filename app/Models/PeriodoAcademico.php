<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeriodoAcademico extends Model
{
    use HasFactory;

    protected $table = 'periodos_academicos';

    protected $fillable = [
        'colegio_id',
        'nombre',
        'codigo',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'ano_lectivo',
        'orden',
        'activo',
        'es_actual',
        'descripcion',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'activo' => 'boolean',
        'es_actual' => 'boolean',
    ];

    /**
     * Relación con el colegio
     */
    public function colegio(): BelongsTo
    {
        return $this->belongsTo(Colegio::class, 'colegio_id');
    }

    /**
     * Scope para períodos activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para período actual
     */
    public function scopeActual($query)
    {
        return $query->where('es_actual', true);
    }

    /**
     * Scope por año lectivo
     */
    public function scopeAnoLectivo($query, int $ano)
    {
        return $query->where('ano_lectivo', $ano);
    }

    /**
     * Scope por tipo de período
     */
    public function scopeTipo($query, string $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope para períodos vigentes (dentro del rango de fechas)
     */
    public function scopeVigentes($query)
    {
        $hoy = now()->toDateString();
        return $query->where('fecha_inicio', '<=', $hoy)
                    ->where('fecha_fin', '>=', $hoy);
    }

    /**
     * Verificar si el período está vigente
     */
    public function estaVigente(): bool
    {
        $hoy = now()->toDateString();
        return $this->activo && 
               $this->fecha_inicio <= $hoy && 
               $this->fecha_fin >= $hoy;
    }

    /**
     * Verificar si el período ya finalizó
     */
    public function haFinalizado(): bool
    {
        return $this->fecha_fin < now()->toDateString();
    }

    /**
     * Verificar si el período aún no ha iniciado
     */
    public function noHaIniciado(): bool
    {
        return $this->fecha_inicio > now()->toDateString();
    }

    /**
     * Obtener la duración del período en días
     */
    public function getDuracionEnDias(): int
    {
        return $this->fecha_inicio->diffInDays($this->fecha_fin) + 1;
    }
}