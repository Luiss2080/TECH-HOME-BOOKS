<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionNotificacion extends Model
{
    use HasFactory;

    protected $table = 'configuraciones_notificaciones';

    protected $fillable = [
        'usuario_id',
        'usuario_tipo',
        'tipo_notificacion',
        'email_activo',
        'push_activo',
        'sms_activo',
        'horario_inicio',
        'horario_fin'
    ];

    protected $casts = [
        'email_activo' => 'boolean',
        'push_activo' => 'boolean',
        'sms_activo' => 'boolean',
        'horario_inicio' => 'datetime:H:i',
        'horario_fin' => 'datetime:H:i'
    ];

    public function usuario()
    {
        switch ($this->usuario_tipo) {
            case 'admin':
                return $this->belongsTo(User::class, 'usuario_id');
            case 'docente':
                return $this->belongsTo(Docente::class, 'usuario_id');
            case 'estudiante':
                return $this->belongsTo(Estudiante::class, 'usuario_id');
            default:
                return null;
        }
    }
}