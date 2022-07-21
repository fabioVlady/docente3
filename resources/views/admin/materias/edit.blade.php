@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Materia</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($materia, ['route'=>['admin.materias.update', $materia], 'method'=>'put']) !!}
            
                @include('admin.materias.partials.form')
                {!! Form::submit('Actualizar Materia', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
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