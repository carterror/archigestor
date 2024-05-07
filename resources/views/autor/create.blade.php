@extends('layout')

@section('title')
  Nuevo Autor
@endsection

@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{route('autor.index')}}">Autores</a></li>
    <li class="breadcrumb-item active">Nuevo Autor</li>

@endsection

@section('content')

<div class="container-fluid">

    <!-- Main row -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Autor</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('autor.store')}}" method="POST">

          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombres</label>
              <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Entrar Nombre">
              @error('nombre')
                <label for="nombre" style="color: red;">*El Nombre es obligatorio</label>
              @enderror
            </div>
            <div class="form-group">
                <label for="apellido1">Primer Apellido</label>
                <input type="text" class="form-control" name="apellido1" value="{{old('apellido1')}}" placeholder="Entrar Primer Apellido">
                @error('apellido1')
                <label for="nombre" style="color: red;">*El Primer Apellido es obligatorio</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellido2">Segundo Apellido</label>
                <input type="text" class="form-control" name="apellido2" value="{{old('apellido2')}}" placeholder="Entrar Segundo Apellido">
                @error('apellido2')
                <label for="nombre" style="color: red;">*El Segundo Apellido es obligatorio</label>
                @enderror
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Crear</button>
          </div>
        </form>
      </div>
    <!-- /.row (main row) -->
</div>

@endsection
