@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
        <div class="row">   
                <div class="col-md-4 center-icon">
                    <a href="{{ route('servicios') }}">
                        <i class="fa fa-handshake fa-5x" ></i>
                        <div>
                           <label>Servicios</label>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 center-icon">
                    <a href="{{ route('listarTemas') }}">
                        <i class="fa fa-book fa-5x" ></i>
                        <div>
                           <label>Temas</label>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 center-icon">
                    <a href="{{ route('listarOfertas') }}">
                        <i class="fa fa-pencil-alt fa-5x" ></i>
                        <div>
                           <label>Ofertas</label>
                        </div>
                    </a>
                </div>
        </div>
        </br></br></br>
        <div class="row">
        <div class="col-md-4 center-icon">
                    <a href="{{ route('calendario') }}">
                        <i class="fa fa-calendar fa-5x" ></i>
                        <div>
                           <label>Calendario</label>
                        </div>
                    </a>
                </div>
        </div>
</div>
@endsection
