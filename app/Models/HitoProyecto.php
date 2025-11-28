<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitoProyecto extends Model
{
    use HasFactory;

    protected $table = 'hitos_proyectos';

    protected $fillable = [
        'proyecto_id',
        'titulo',
        'descripcion',
        'fecha_limite',
        'puntuacion',
        'orden',
        'estado'
    ];

    protected $casts = [
        'fecha_limite' => 'date',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function entregas()
    {
        return $this->hasMany(EntregaHito::class);
    }
}