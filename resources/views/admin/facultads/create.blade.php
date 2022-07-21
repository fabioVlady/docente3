@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Facultad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.facultads.store']) !!}
                @include('admin.facultads.partials.form')
                {!! Form::submit('Crear Facultad', ['class'=>'btn btn-success']) !!}
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