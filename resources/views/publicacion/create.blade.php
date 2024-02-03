@extends('layout')

@section('title')
    Nueva Publicación
@endsection

@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{route('publicacion.index')}}">Publicaciones</a></li>
    <li class="breadcrumb-item active">Nueva Publicación</li>

@endsection

@section('content')

<div class="container-fluid">

    <!-- Main row -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Publicación</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('publicacion.store')}}" method="POST">
         @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Autores</label>
                <select class="select2bs4" multiple="multiple" name="autores[]" data-placeholder="Seleciona los Autores" style="width: 100%;">
                    @foreach ($autores as $autor)
                        <option value="{{$autor->id}}">{{$autor->nombre}} {{$autor->apellido1}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="materia">Materia</label>
                <input type="text" class="form-control" list="materia" value="{{old('materia')}}" name="materia" placeholder="Entrar el Título">
                <datalist id="materia">
                  @php
                      $mate="0";
                  @endphp
                    @foreach ($materias as $m)
                      @if ($mate != $m->materia)
                        <option value="{{$m->materia}}">
                      @endif
                      @php
                        $mate = $m->materia;
                      @endphp
                    @endforeach
                  </datalist>
                @error('materia')
                <label for="nombre" style="color: red;"></label>
                @enderror
            </div>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}" placeholder="Entrar el Título">
                @error('titulo')
                <label for="nombre" style="color: red;">*El Título es obligatorio</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="edicion">Edición</label>
                <input type="number" class="form-control" name="edicion" value="{{old('edicion')}}" placeholder="Entrar la edición">
                @error('edicion')
                <label for="nombre" style="color: red;">*La edición es obligatorio</label>
                @enderror
            </div>
            <div class="form-group">
              <label for="fecha">Fecha</label>
              <input type="month" class="form-control" name="fecha" value="{{old('fecha')}}" >
              @error('fecha')
              <label for="nombre" style="color: red;">*La fecha es obligatoria</label>
              @enderror
            </div>
            <div class="form-group">
                <label for="paginas">Páginas</label>
                <input type="text" class="form-control" name="paginas" value="{{old('paginas')}}" placeholder="Entrar las páginas">
                @error('paginas')
                <label for="nombre" style="color: red;">*Las páginas son obligatorias</label>
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
