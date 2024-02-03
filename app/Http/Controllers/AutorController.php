<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::orderBy('nombre')->paginate(10);

        return view('autor.index', compact('autores'));
    }

    public function create()
    {
        return view('autor.create');
    }

    public function show($autores)
    {
        $publicaciones = [];
        $public = Publicacion::with(['autors'])->orderBy('edicion', 'asc')->get();

        foreach ($public as $value) {
            foreach ($value->autors as $v) {
                if ($v->id == $autores) {
                    array_push($publicaciones, $value);
                }
            }
        }
        return view('publicacion.busca', compact('publicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido1' => 'required',
        ]);

        $repite = Autor::where('nombre', $request->nombre)->where('apellido1', $request->apellido1)->where('apellido1', $request->apellido1)->count();

        if ($repite > 0) {
            return back()->with("message", "El autor ya existe")->with("type", "danger");
        }
        

        $autor = new Autor();
        
        $autor->nombre = $request->nombre;
        $autor->apellido1 = $request->apellido1;
        $autor->apellido2 = $request->apellido2;

        if ($autor->save()) {
            return redirect()->route('autor.index')->with("message", "Autor creado con éxito")->with("type", "success");
        }

    }

    public function edit(Autor $autor)
    {
        
        return view('autor.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido1' => 'required',
        ]);

        $autor->nombre = $request->nombre;
        $autor->apellido1 = $request->apellido1;
        $autor->apellido2 = $request->apellido2;

        if ($autor->save()) {
            return redirect()->route('autor.index')->with("message", "Autor actualizado con éxito")->with("type", "success");
        }
    }

    public function destroy(Autor $autor)
    {
        if ($autor->delete()) {
            return back()->with("message", "Autor eliminado con éxito")->with("type", "success");
        }
    }
}
