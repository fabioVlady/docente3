@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Materia Dictada</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            {!! Form::open(['route' => 'admin.docente_materia.store']) !!}
                @include('admin.docente_materia.partials.form')
                {!! Form::submit('Crear Materia dictada', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="facultad_id"]').on('change', function() {
            var facultad_id = $(this).val();
            if(facultad_id) {
                $.ajax({
                    url: '/admin/carrera/'+facultad_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                      
                        $('select[name="carrera_id"]').empty();
                        $('select[name="materia_id"]').empty();
                        $('select[name="carrera_id"]').append('<option value="">'+ "Escoja la Carrera" +'</option>');

                        $.each(data, function(key, value) {
                        $('select[name="carrera_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="carrera_id"]').empty();
                $('select[name="materia_id"]').empty();
            }
        });
        $('select[name="carrera_id"]').on('change', function() {
            var carrera_id = $(this).val();
            if(carrera_id) {
                $.ajax({
                    url: '/admin/materia/'+carrera_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                      
                        $('select[name="materia_id"]').empty();
                        $('select[name="materia_id"]').append('<option value="">'+ "Escoja la Materia" +'</option>');
                        $.each(data, function(key, value) {
                        $('select[name="materia_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="materia_id"]').empty();
            }
        });
    });
</script>
@stop