<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Publicacion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::with(['autors'])->orderBy('edicion', 'asc')->paginate(10);

        return view('publicacion.index', compact('publicaciones'));
    }

    public function order($orden)
    {

        $publicaciones = Publicacion::with(['autors'])->orderBy($orden, 'asc')->paginate(10);
        
        return view('publicacion.index', compact('publicaciones'));
    }

    
    public function buscar(Request $request)
    {

        if ($request->tipo == "autor") {
            
            try {

                $autor = Autor::where('nombre', 'LIKE', '%'.$request->busca.'%')->orWhere('apellido1', 'LIKE', '%'.$request->busca.'%')->orWhere('apellido2', 'LIKE', '%'.$request->busca.'%')->first()->id;
            
            } catch (Exception $th) {

                if (Str::contains($th, 'non-object')) {
                    return back()->with("message", "No existen coincidencias")->with("type", "danger");
                } else {
                    return $th;
                }

            }

            $public = DB::select('select publicacion_id from autor_publicacion where autor_id = ?', [$autor]);
            
            $ids = [];

            foreach ($public as $value) {
                array_push($ids, $value->publicacion_id);
            }
            
            $publicaciones = Publicacion::with(['autors'])->whereIn('id', $ids)->get();
        } else {

            $publicaciones = Publicacion::with(['autors'])->where($request->tipo, 'LIKE', '%'.$request->busca.'%')->orderBy('edicion', 'asc')->get();
        
        }

        if ($publicaciones->count()) {
            return view('publicacion.busca', compact('publicaciones'));
        } else {
            return back()->with("message", "No existen coincidencias")->with("type", "danger");
        }

    }

    public function create()
    {
        $autores = Autor::all();
        $materias = Publicacion::distinct('materia')->latest('materia')->get();
        
        return view('publicacion.create', compact('autores', 'materias'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'titulo' => 'required',
            'materia' => 'required',
            'edicion' => 'numeric',
        ]);

        $publicacion = new Publicacion();

        $publicacion->materia = $request->materia;
        $publicacion->titulo = $request->titulo;
        $publicacion->edicion = $request->edicion;
        $publicacion->paginas = $request->paginas;
        $publicacion->fecha = $request->fecha;


        if ($publicacion->save()) {

            $publicacion->autors()->attach($request->autores);
            
            return redirect()->route('publicacion.index')->with("message", "Publicación creado con éxito")->with("type", "success");
        }
    }

    public function edit($id)
    {
        $publicacion = Publicacion::with(['autors'])->find($id);

        $autors = "";

        foreach ($publicacion->autors as $autor) {
            $autors .= $autor->id.",";
        }

        $autores = Autor::all();
        $materias = Publicacion::distinct('materia')->latest('materia')->get();

        return view('publicacion.edit', compact('autors', 'autores', 'materias', 'publicacion'));
        
    }

    public function update(Request $request, Publicacion $publicacion)
    {

        $request->validate([
            'titulo' => 'autors',
            'titulo' => 'required',
            'materia' => 'required',
            'edicion' => 'numeric',
        ]);

        $publicacion->materia = $request->materia;
        $publicacion->titulo = $request->titulo;
        $publicacion->edicion = $request->edicion;
        $publicacion->paginas = $request->paginas;
        $publicacion->fecha = $request->fecha;

        
        if ($publicacion->update()) {


            $publicacion->autors()->sync($request->autores);


            return redirect()->route('publicacion.index')->with("message", "Publicación actualizada con éxito")->with("type", "success");
        }

    }

    public function destroy(Publicacion $publicacion)
    {
        if ($publicacion->delete()) {
            return back()->with("message", "Publicacion eliminado con éxito")->with("type", "success");
        }
    }
}
