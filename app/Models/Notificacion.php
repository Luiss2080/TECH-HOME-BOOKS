<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [
        'usuario_id',
        'usuario_tipo',
        'titulo',
        'mensaje',
        'tipo',
        'url',
        'icono',
        'leida',
        'fecha_envio',
        'fecha_lectura'
    ];

    protected $casts = [
        'leida' => 'boolean',
        'fecha_envio' => 'datetime',
        'fecha_lectura' => 'datetime'
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