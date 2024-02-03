<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::count();
        $publicaciones = Publicacion::count();
        $materias = Publicacion::distinct('materia')->count();
        $autormaxc = DB::select('SELECT autor_id, count(autor_id) c FROM autor_publicacion GROUP BY autor_id');

        $autorpublicaciones = 0;
        $id = 0;

        foreach ($autormaxc as $value) {
            if ($value->c > $autorpublicaciones) {
                $autorpublicaciones = $value->c;
                $id = $value->autor_id;
            }
        }

       

        $estadisticas = [
            'autores' => $autores,
            'publicaciones' => $publicaciones,
            'materias' => $materias,
            'autorpublicaciones' => $autorpublicaciones,
            
        ];

        return view('welcome', $estadisticas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function asd()
    {
        $autores = Autor::all();
        foreach($autores as $autor){
            if($autor->nombre == 'nt'){
                $autor->nombre = "";
                $autor->save();
            }
        }
        return 'save';
    }
}
