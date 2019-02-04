
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
        <li class="breadcrumb-item"><a href="{{ route('listarOfertas') }}">Listado de Ofertas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Crear Ofertas</li>
      </ol>
    </nav>
</br>
</br>

    <legend>Crear Oferta</legend>
    @if (session()->has('info'))
        <h3>{{ session('info')}}</h3>
    @else

      <form  method="POST" action="crearOferta">
        {!! csrf_field() !!}
        <div class ="row">

            <div class="col-md-3 ">
              <div class="form-group" style="width: 270px">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" name="codigo" value="{{old('nombreServicio')}}"  >
                {!! $errors->first('codigo', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <!--<div class="col-md-3 ">
              <div class="form-group" style="width: 270px">
                <label for="nombreServicio">Nombre del servicio:</label>
                <input type="text" class="form-control" name="nombreServicio" value="{{old('nombreServicio')}}">
                {!! $errors->first('nombreServicio', '<span class=error>:message</span>') !!}
              </div>
            </div>-->
            <div class="col-md-3 ">
              <div>
                <label for="servicio">Servicio:</label>
                <select class="form-control" name="servicio" style="width: 270px">
                 <option value=""> --- </option>
                 @foreach($servicios as $servicio)
                  <option value="{{ $servicio->id }}" {{ (old("servicio") == $servicio->id ? "selected":"") }}>{{ $servicio->nombre }}</option>
                 @endforeach
                </select>
                {!! $errors->first('servicio', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-3 ">
              <div>
                <label for="tema">Tema:</label>
                <select class="form-control" name="tema" style="width: 270px">
                 <option value=""> --- </option>
                 @foreach($temas as $tema)
                   <option value="{{ $tema->id }}" {{ (old("tema") == $tema->id ? "selected":"") }}>{{ $tema->nombre }}</option>
                 @endforeach
                </select>
                {!! $errors->first('tema', '<span class=error>:message</span>') !!}
              </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-3 ">
              <div>
                <label for="responsable">Responsable:</label>
                <select class="form-control" name="responsable" style="width: 270px">
                 <option value=""> --- </option>
                 @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" {{ (old("responsable") == $profesor->id ? "selected":"") }}>{{ $profesor->nombre }}</option>
                 @endforeach
                </select>
                {!! $errors->first('responsable', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-3 ">
              <div class="form-group" style="width: 270px">
                <label for="nombreSolicitante">Nombre del solicitante:</label>
                <input type="text" class="form-control" name="nombreSolicitante" value="{{old('nombreSolicitante')}}">
                {!! $errors->first('nombreSolicitante', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-2 ">
              <div class="form-group" style="width: 100px">
                <label for="cupo">Cupo Max:</label>
                <input type="number" class="form-control" name="cupo" value="{{old('cupo')}}">
                {!! $errors->first('cupo', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-1 ">
              <div class="form-check">
                <label for="cupo">Ponencia:</label>
                    <input class="form-check-input" type="checkbox" name="ponencia[]" value="1" @if(old('ponencia') && in_array(1, old('ponencia'))) checked @endif>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 ">
              <div class="form-group" style="width: 270px">
                <label for="ubicacion">Ubicacion:</label>
                <input type="text" class="form-control" name="ubicacion" value="{{old('ubicacion')}}">
                {!! $errors->first('ubicacion', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-3 ">
              <div class="form-group" style="width: 270px">
                <label for="salon">Salon:</label>
                <input type="text" class="form-control" name="salon" value="{{old('salon')}}">
                {!! $errors->first('salon', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-2 ">
              <div class="form-group" style="width: 150px">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}">
                {!! $errors->first('fecha', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-2 ">
              <div class="form-group" style="width: 150px">
                <label for="horaInicio">Hora Inicio:</label>
                <input type="time" class="form-control" name="horaInicio" value="{{old('horaInicio')}}">
                {!! $errors->first('horaInicio', '<span class=error>:message</span>') !!}
              </div>
            </div>
            <div class="col-md-2 ">
              <div class="form-group" style="width: 150px">
                <label for="horaFin">Hora Fin:</label>
                <input type="time" class="form-control" name="horaFin" value="{{old('horaFin')}}">
                {!! $errors->first('horaFin', '<span class=error>:message</span>') !!}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 ">
              <div class="form-group" style="width: 700px">
                <label for="descripcion">Descripcion:</label>
                <textarea type="text" class="form-control"  name="descripcion">{{old('descripcion')}}</textarea>
                {!! $errors->first('descripcion', '<span class=error>:message</span>') !!}
              </div>
            </div>
          </div>
          <br>
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
          
          
        </div>
      @endif
  </fieldset>
</div>
@endsection
