@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Carrera</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($carrera, ['route'=>['admin.carreras.update', $carrera], 'method'=>'put']) !!}
            
            @include('admin.carreras.partials.form')
                {!! Form::submit('Actualizar carrera', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="~select2/dist/css/select2.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop