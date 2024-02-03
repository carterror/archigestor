<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class Materia extends Controller
{
    //
    public function index()
    {
        $materias = Publicacion::orderBy('materia')->get()->unique('materia');
        return view('materia.index', compact('materias'));
    }

    public function show()
    {
        $materias = Publicacion::orderBy('materia')->get()->unique('materia');
        return view('materia.index', compact('materias'));
    }

    public function edit($materia)
    {
        $publicaciones = Publicacion::with(['autors'])->orderBy('edicion', 'asc')->where('materia', $materia)->paginate(10);
        return view('publicacion.index', compact('publicaciones'));
    }

    
}
