@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Curso Idioma</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($curso_idioma, ['route' => ['admin.curso_idiomas.update', $curso_idioma], 'method' => 'put']) !!}
                @include('admin.curso_idiomas.partials.form')
                {!! Form::submit('Actualizar Curso', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop