
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
        <li class="breadcrumb-item active" aria-current="page">Servicios</li>
      </ol>
    </nav>
</br>
</br>
    <div class="row">
            
                <div class="col-md-6 center-icon">
                    <a href="{{ route('serviciosListar') }}">
                        <i class="fa fa-comments fa-5x" ></i>
                        <div>
                           <label>Parametros</label>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 center-icon">
                   <i class="fa fa-file fa-5x"></i>
                   <div>
                       <label>Informes</label>
                   </div>
                </div>
    </div>
</div>
@endsection
