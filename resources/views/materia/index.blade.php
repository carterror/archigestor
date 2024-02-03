@extends('layout')

@section('title')
  Materias
@endsection

@section('breadcrumb')

    <li class="breadcrumb-item active">Materias</li>

@endsection

@section('content')

<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             

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

                    <th colspan="2"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($materias as  $autor)
                        
                          <tr>
                            <td><a href="{{route('materia.edit', $autor->materia)}}">{{$autor->materia}}</a></td>
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
                    <div class="col s12"></div>
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