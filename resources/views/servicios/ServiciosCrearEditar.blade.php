@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('serviciosListar') }}">Lista de servicios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Servicio</li>
      </ol>
    </nav>
	</br>
	<form action="{{ route('serviciosCrearEditar.crearEditar') }}" method="POST">
		<div class="form-group">
			{{csrf_field()}}
			@if(!$crear)
				<input name="id" type="hidden" value="{{$servicio->id}}">
			@endif

			<div class="row">
				<div class="col-md-3">
					<label for="nombre">Codigo:</label>
					@if($crear)
						<input class="form-control"  type="text" name="codigo" value="{{old('codigo')}}">
					@else
						<input class="form-control"  type="text" name="codigo" value="{{$servicio->codigo}}">
					@endif
					{!! $errors->first('codigo', '<span class=error>:message</span>') !!}
					
				</div>
				
				<div class="col-md-7">
					<label for="nombre">Nombre:</label>
					@if($crear)
						<input  class="form-control" type="text" name="nombre" value="{{old('nombre')}}">
					@else
						<input  class="form-control" type="text" name="nombre" value="{{$servicio->nombre}}">
					@endif
					{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
					
				</div>
				
			</div>
			</br>
			<div class="row">
				<div class="col-md-10">
					<label for="nombre">Descripcion:</label>
					@if($crear)
						<textarea type="text" class="form-control"  name="descripcion">{{old('descripcion')}}</textarea>
					@else
						<textarea type="text" class="form-control"  name="descripcion">{{$servicio->descripcion}}</textarea>
							
						</textarea>
					@endif
				</div>

			</div>
			<br>
			<div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>

	</form>
</div>
@endsection
