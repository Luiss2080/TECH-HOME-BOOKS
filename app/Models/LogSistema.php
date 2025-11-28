<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSistema extends Model
{
    use HasFactory;

    protected $table = 'logs_sistema';

    protected $fillable = [
        'usuario_id',
        'usuario_tipo',
        'accion',
        'modulo',
        'descripcion',
        'ip',
        'user_agent',
        'fecha_hora',
        'datos_anteriores',
        'datos_nuevos'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
        'datos_anteriores' => 'array',
        'datos_nuevos' => 'array'
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