@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Registro Formacion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.formacions.store']) !!}
                @include('admin.formacions.partials.form')
                {!! Form::submit('Crear Formacion', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop