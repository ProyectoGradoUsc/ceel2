@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('servicios') }}">Servicios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lista de Servicios</li>
      </ol>
    </nav>
	</br>

	<div>
      <a href="{{ route('serviciosCrearEditar',0) }}"><button type="submit" class="btn btn-primary">Crear servicio</button></a>
    </div>
    <br><br>
    @if ($servicios != "[]")
	<table border="2"  class="table-info" style="width: 100%;">
	  <thead>
	    <tr>
	      <th style="text-align: center;">Id</th>
	      <th style="text-align: center;">Codigo</th>
	      <th style="text-align: center;">Nombre</th>
	      <th style="text-align: center;">Descripción</th>
	      <th style="text-align: center; width: 7%">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
		@foreach($servicios as $servicio)
	    <tr>
	    	<td style="text-align: center">{{$servicio->id}}</td>
	    	<td style="text-align: center">{{$servicio->codigo}}</td>
	      	<td style="text-align: center">{{$servicio->nombre}}</td>
	      	<td style="text-align: center">{{$servicio->descripcion}}</td>
	      
	      <th style="text-align: center;">
	      	<label>
	      		<a href="{{ route('serviciosCrearEditar',$servicio->id) }}" title="Editar">
	      			<i class="fa fa-edit" ></i>
	      		</a>|
	      		<a href="{{ route('serviciosCrearEditar.eliminar',$servicio->id) }}" title="Eliminar">
	      			<i class="fa fa-times"></i>
	      		</a>
	      	</label>
	      </th>
	    </tr>
		@endforeach
	  </tbody>
	</table>
	@else
    <h4>No se encontraron resultados</h4>
    @endif
</div>
@endsection
