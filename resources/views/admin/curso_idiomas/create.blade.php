@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Curso Idioma</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.curso_idiomas.store']) !!}
                @include('admin.curso_idiomas.partials.form')
                {!! Form::submit('Crear Curso', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop