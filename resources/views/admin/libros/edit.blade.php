@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Publicacion Libro</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($libro, ['route'=>['admin.libros.update', $libro], 'method'=>'put']) !!}
                @include('admin.libros.partials.form')
                {!! Form::submit('Actualizar Formacion', ['class'=>'btn btn-success']) !!}
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