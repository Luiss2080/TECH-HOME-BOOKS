<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_archivo',
        'ruta_archivo',
        'tamaño',
        'tipo_backup',
        'fecha_creacion',
        'descripcion',
        'estado',
        'usuario_id'
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}