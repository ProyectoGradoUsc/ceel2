
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
        <li class="breadcrumb-item active" aria-current="page">Listado de Temas</li>
      </ol>
    </nav>
</br>
</br>
    
    <legend>Listado de Temas</legend>
    <br>
    <div>
      <a href="{{ route('showCreateTemas') }}"><button type="submit" class="btn btn-primary">Crear tema</button></a>
    </div>
    <br><br>
    @if ($allTemas != "[]")
    <table border="2"  class="table-info" style="width: 100%;">
      <thead>
        <tr>
          <th style="text-align: center">Id</th>
          <th style="text-align: center">Nombre</th>
          <th style="text-align: center">Descripcion</th>
          <th style="text-align: center; width: 7%">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allTemas as $element)
        <tr>
          <td style="text-align: center">{{ $element->id }}</td>
          <td style="text-align: center">{{ $element->nombre }}</td>
          <td style="text-align: center">{{ $element->descripcion }}</td>
          <th style="text-align: center;">
            <label>
              <a href="{{ route('showEditTemas', $element->id) }}" title="Editar">
                <i class="fa fa-edit" ></i>
              </a>|
              <a href="{{ route('deleteTema',$element->id) }}" title="Eliminar">
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
