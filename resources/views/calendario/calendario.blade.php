@extends('layouts.app')

@section('content')
<label >calendario</label>
<div id="calendar"></div>


@endsection
@section('script')

<script type="text/javascript">

        //inicializamos el calendario al cargar la pagina
        $(document).ready(function() {
            console.log("script jpa");
            
            $('#calendar').fullCalendar({
 
                header: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
 
            });
 
        });
 </script>
@endsection