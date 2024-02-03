@extends('layout')

@section('title')
  Publicaciones
@endsection

@section('breadcrumb')

    <li class="breadcrumb-item active">Publicaciones</li>

@endsection

@section('content')

<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('publicacion.create')}}" class="btn btn-primary"><h3 class="card-title">Nueva publicación</h3></a>

              <div class="card-tools">
              <form action="{{route('publicacion.buscar')}}" method="POST">
                @csrf
                <div class="input-group input-group-md">
                  <select name="tipo" id="" class="form-control float-right">
                    <option value="titulo">Título</option>
                    <option value="materia">Materia</option>
                    <option value="fecha">Fecha</option>
                    <option value="autor">Autor</option>
                  </select>
                  <input type="text" name="busca" class="form-control float-right" placeholder="Buscar">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Autores</th>
                    <th><a href="{{route('publicacion.ordenar', 'titulo')}}">Título <i class="fas fa-sort-amount-down right"></i></a></th>
                    <th><a href="{{route('publicacion.ordenar', 'materia')}}">Materia <i class="fas fa-sort-amount-down right"></i></a></th>
                    <th><a href="{{route('publicacion.ordenar', 'edicion')}}">Ed <i class="fas fa-sort-amount-down right"></i></a></th>
                    <th><a href="{{route('publicacion.ordenar', 'fecha')}}">Fecha <i class="fas fa-sort-amount-down right"></i></a></th>
                    <th><a href="{{route('publicacion.ordenar', 'paginas')}}">Páginas <i class="fas fa-sort-amount-down right"></i></a></th>
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
                            <!-- <td>{{date("m/y", strtotime($publicacion->fecha))}}</td> -->
                            <td>{{$publicacion->fecha}}</td>
                            <td>{{$publicacion->paginas}}</td>
                            <td><a href="{{route('publicacion.edit', $publicacion)}}"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                              <form action="{{route('publicacion.destroy', $publicacion)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="border:none; margin: none; background: none; padding:none;"><i class="fas fa-trash" style="color: red;"></i></button>
                              </form>
                              
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                  <div class="row container">
                    <div class="col s12">{{$publicaciones->links('paginacion')}}</div>
                  </div>
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