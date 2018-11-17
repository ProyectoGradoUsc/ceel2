
@extends('layouts.app')
<style type="text/css">
.center-icon{
    text-align: center;
}

</style>
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listarTemas') }}">Listado de Temas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear Temas</li>
      </ol>
    </nav>
</br>
</br>
    
    <legend>Temas</legend>
    @if (session()->has('info'))
        <h3>{{ session('info')}}</h3>
    @else
      <form  method="POST" action="crearTema">
        {!! csrf_field() !!}
        <div class ="row">
          <div class="col-md-3 ">
            <div class="form-group" style="width: 300px">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre" value={{old('nombre')}}>
              {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
            </div>
            <div class="form-group" style="width: 600px">
              <label for="descripcion">Descripcion:</label>
              <textarea type="text" class="form-control"  name="descripcion">{{old('descripcion')}}</textarea>
              {!! $errors->first('descripcion', '<span class=error>:message</span>') !!}
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          
        </div>
      </form>
      @endif
  </fieldset>
</div>
@endsection
