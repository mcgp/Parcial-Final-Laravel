<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'costo_promedio',
        'edad_minima',
    ];

    public function exhibiciones()
{
    return $this->hasMany('App\Models\Exhibition', 'category_id');
}
}
