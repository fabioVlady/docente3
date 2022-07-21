@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Curso Extra</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($curso_extra, ['route' => ['admin.curso_extras.update', $curso_extra], 'method' => 'put']) !!}
                @include('admin.curso_extras.partials.form')
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