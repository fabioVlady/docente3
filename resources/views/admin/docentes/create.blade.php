@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Docente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.docentes.store']) !!}
                @include('admin.docentes.partials.form')
                {!! Form::submit('Crear Docente', ['class'=>'btn btn-success']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
          $('#persona_id').select2({
            theme: "classic",
            
          });
    </script>
@stop