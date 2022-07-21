@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Materia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.materias.store']) !!}
                @include('admin.materias.partials.form')
                {!! Form::submit('Crear Materia', ['class'=>'btn btn-success']) !!}
                
            {!! Form::close() !!}
            {{-- {!! Form::open(['route' => 'admin.materias.store']) !!}
                @livewire('admin.carreras-create')

                {!! Form::submit('Crear Materia', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!} --}}
        </div>
    </div>
@stop


@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
          $('#carrera_id').select2({
            theme: "classic",
          });
          
    </script>
    {{-- <script>
        $("#carrera_id").depdrop({
            url: '/server/getSubcat.php',
            depends: ['facultad_id']
        });
    </script> --}}
@stop
{{-- @section('css') --}}
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- @stop --}}

{{-- @section('js') --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="facultad"]').on('change','.facultad', function() {
                
                var stateID = $(this).val();
                console.log(stateID);
                if(stateID) {
                    $.ajax({
                        url: '/admin.materias.carrera/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {                      
                            $('select[name="carrera"]').empty();
                            $.each(data, function(key, value) {
                            $('select[name="carrera"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="carrera"]').empty();
                }
            });
        });
    </script> --}}
 
{{-- @stop --}}