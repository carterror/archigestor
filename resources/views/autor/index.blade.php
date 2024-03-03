@extends('layout')

@section('title') Autores @endsection

@section('breadcrumb')

    <li class="breadcrumb-item active">Autores</li>

@endsection

@section('content')

<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('autor.create')}}" class="btn btn-primary"><h3 class="card-title">Nuevo Autor</h3></a>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>1er Apellido</th>
                    <th>2do Apellido</th>
                    <th colspan="2"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)

                          <tr>
                            <td><a href="{{route('autor.show', $autor)}}">{{$autor->nombre}}</a></td>
                            <td>{{$autor->apellido1}}</td>
                            <td>{{$autor->apellido2}}</td>
                            <td><a href="{{route('autor.edit', $autor)}}">Editar</a></td>
                            <td>
                              <form action="{{route('autor.destroy', $autor)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                              </form>
                            </td>
                          </tr>

                    @endforeach
                </tbody>
                <tfoot>
                  <div class="row container">
                    <div class="col s12">{{$autores->links('paginacion')}}</div>
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
