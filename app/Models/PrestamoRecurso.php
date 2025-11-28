<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoRecurso extends Model
{
    use HasFactory;

    protected $table = 'prestamos_recursos';

    protected $fillable = [
        'recurso_educativo_id',
        'usuario_id',
        'usuario_tipo',
        'fecha_prestamo',
        'fecha_devolucion_prevista',
        'fecha_devolucion_real',
        'motivo',
        'observaciones_prestamo',
        'observaciones_devolucion',
        'estado'
    ];

    protected $casts = [
        'fecha_prestamo' => 'datetime',
        'fecha_devolucion_prevista' => 'datetime',
        'fecha_devolucion_real' => 'datetime'
    ];

    public function recursoEducativo()
    {
        return $this->belongsTo(RecursoEducativo::class);
    }

    public function usuario()
    {
        switch ($this->usuario_tipo) {
            case 'docente':
                return $this->belongsTo(Docente::class, 'usuario_id');
            case 'estudiante':
                return $this->belongsTo(Estudiante::class, 'usuario_id');
            default:
                return null;
        }
    }
}