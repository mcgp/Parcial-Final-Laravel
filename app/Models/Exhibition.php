<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'hora_inicio',
        'hora_fin',
        'ubicacion',
        'presentador',
        'especie',
        'capacidad_maxima',
        'fecha_exhibicion',
        'categoty_id',
        'costo_entrada',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
