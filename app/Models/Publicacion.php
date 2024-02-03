<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'materia',
        'titulo',
        'edicion',
        'paginas',
        'fecha',

    ];

    // Relacion muchos a muchos
    public function autors()
    {
        return $this->belongsToMany(Autor::class);
    }
}
