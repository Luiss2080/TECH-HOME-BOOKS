<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [
        'user_id',
        'emisor_id',
        'titulo',
        'mensaje',
        'tipo',
        'modulo',
        'datos_adicionales',
        'leida',
        'leida_en',
        'email_enviado',
        'email_enviado_en',
        'prioridad',
        'expira_en',
    ];

    protected $casts = [
        'datos_adicionales' => 'array',
        'leida' => 'boolean',
        'email_enviado' => 'boolean',
        'leida_en' => 'datetime',
        'email_enviado_en' => 'datetime',
        'expira_en' => 'datetime',
    ];

    /**
     * Relación con el usuario que recibe la notificación
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el usuario emisor de la notificación
     */
    public function emisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'emisor_id');
    }

    /**
     * Scope para notificaciones no leídas
     */
    public function scopeNoLeidas($query)
    {
        return $query->where('leida', false);
    }

    /**
     * Scope para notificaciones leídas
     */
    public function scopeLeidas($query)
    {
        return $query->where('leida', true);
    }

    /**
     * Scope para notificaciones no expiradas
     */
    public function scopeVigentes($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expira_en')
              ->orWhere('expira_en', '>', now());
        });
    }

    /**
     * Scope por tipo de notificación
     */
    public function scopeTipo($query, string $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope por módulo
     */
    public function scopeModulo($query, string $modulo)
    {
        return $query->where('modulo', $modulo);
    }

    /**
     * Scope por prioridad
     */
    public function scopePrioridad($query, string $prioridad)
    {
        return $query->where('prioridad', $prioridad);
    }

    /**
     * Marcar notificación como leída
     */
    public function marcarComoLeida(): bool
    {
        return $this->update([
            'leida' => true,
            'leida_en' => now(),
        ]);
    }

    /**
     * Marcar email como enviado
     */
    public function marcarEmailEnviado(): bool
    {
        return $this->update([
            'email_enviado' => true,
            'email_enviado_en' => now(),
        ]);
    }

    /**
     * Verificar si la notificación está vigente
     */
    public function estaVigente(): bool
    {
        return !$this->expira_en || $this->expira_en > now();
    }
}