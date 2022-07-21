@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Facultad</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($facultad, ['route'=>['admin.facultads.update', $facultad], 'method'=>'put']) !!}
                @include('admin.facultads.partials.form')
                {!! Form::submit('Actualizar facultad', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop