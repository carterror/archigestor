@extends('layout')

@section('title')
    Editar Publicación
@endsection

@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{route('publicacion.index')}}">Publicaciones</a></li>
    <li class="breadcrumb-item active">Editar Publicación</li>

@endsection

@section('content')

<div class="container-fluid">

    <!-- Main row -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Publicación </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('publicacion.update', $publicacion->id)}}" method="POST">
         @csrf
         @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label>Autores</label>
                <select class="select2bs4" multiple="multiple" name="autores[]" data-placeholder="Seleciona los Autores" style="width: 100%;">
                    @foreach ($autores as $autor)
                        <option value="{{$autor->id}}" @if (Str::contains($autors, $autor->id.',')) selected @endif>{{$autor->nombre}} {{$autor->apellido1}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="materia">Materia</label>
                <input type="text" class="form-control" list="materia" value="{{$publicacion->materia}}" name="materia" placeholder="Entrar el Título">
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
                <input type="text" class="form-control" name="titulo" value="{{$publicacion->titulo}}" placeholder="Entrar el Título">
                @error('titulo')
                <label for="nombre" style="color: red;">*El Título es obligatorio</label>
                @enderror
            </div>
            <div class="form-group">
                <label for="edicion">Edición</label>
                <input type="number" class="form-control" name="edicion" value="{{$publicacion->edicion}}" placeholder="Entrar la edición">
                @error('edicion')
                <label for="nombre" style="color: red;">*La edición es obligatorio</label>
                @enderror
            </div>
            <div class="form-group">
              <label for="fecha">Fecha</label>
              <input type="month" class="form-control" name="fecha" value="{{$publicacion->fecha}}" min="" max="2010-01">
              @error('fecha')
              <label for="nombre" style="color: red;">*La fecha es obligatoria</label>
              @enderror
            </div>
            <div class="form-group">
                <label for="paginas">Páginas</label>
                <input type="text" class="form-control" name="paginas" value="{{$publicacion->paginas}}" placeholder="Entrar las páginas">
                @error('paginas')
                <label for="nombre" style="color: red;">*Las páginas son obligatorias</label>
                @enderror
            </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
        </form>
      </div>
    <!-- /.row (main row) -->
</div>

@endsection
