@extends('layout')

@section('title')
  Publicaciones
@endsection

@section('breadcrumb')

<li class="breadcrumb-item"><a href="{{route('publicacion.index')}}">Publicaciones</a></li>
<li class="breadcrumb-item active">Busqueda de Publicación</li>

@endsection

@section('content')

<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('publicacion.index')}}" class="btn btn-primary"><h3 class="card-title">Volver</h3></a>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Autores</th>
                    <th>Título</th>
                    <th>Materia</th>
                    <th>Edición</th>
                    <th>Fecha</th>
                    <th>Páginas</th>
                    <th colspan="2"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($publicaciones as $publicacion)
                        <tr>
                            <td>
                                @forelse ($publicacion->autors as $autors)
                                    {{$autors->nombre}} {{$autors->apellido1}} {{$autors->apellido2}} -
                                @empty
                                @endforelse
                            </td>
                            <td>{{$publicacion->titulo}}</td>
                            <td>{{$publicacion->materia}}</td>
                            <td>{{$publicacion->edicion}}</td>
                            <td>{{date("m/y", strtotime($publicacion->fecha))}}</td>
                            <td>{{$publicacion->paginas}}</td>
                            <td><a href="{{route('publicacion.edit', $publicacion)}}"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                              <form action="{{route('publicacion.destroy', $publicacion)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="border:none; margin: none; background: none; padding:none;"><i class="fas fa-trash" style="color: red;"></i></button>
                              </form>
                              
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
</div>

@endsection