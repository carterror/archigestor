<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'no',
    ];

    // Relacion muchos a muchos
    public function publicacions()
    {
        return $this->belongsToMany(Publicacion::class);
    }

}
