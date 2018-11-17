
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
        <li class="breadcrumb-item active" aria-current="page">Listado de Ofertas</li>
      </ol>
    </nav>
</br>
</br>
    
    <legend>Listado de Ofertas</legend>
    <br>
    <div>
      <a href="{{ route('showCreateOfertas') }}"><button type="submit" class="btn btn-primary">Crear oferta</button></a>
    </div>
    <br><br>
    @if ($allOfertas != "[]")
    <table border="2"  class="table-info" style="width: 100%;">
      <thead>
        <tr>
          <th style="text-align: center">Codigo</th>
          <th style="text-align: center">Descripcion</th>
          <th style="text-align: center">Tema</th>
          <th style="text-align: center; width: 10%">Ponencia</th>
          <th style="text-align: center; width: 7%">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allOfertas as $curso)     
        <tr>
          <td style="text-align: center">{{ $curso->codigo }}</td>
          <td style="text-align: center">{{ $curso->descripcion }}</td>
          <td style="text-align: center">{{ $curso->IdTema }}</td>
          <td style="text-align: center">@if ($curso->ponencia == 0) No @else Si @endif</td>
          <th style="text-align: center">
            <label>
              <a href="{{ route('showCreateOfertas') }}" title="Editar">
                <i class="fa fa-edit" ></i>
              </a>|
              <a href="{{ route('deleteOferta',$curso->id) }}" title="Eliminar">
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
