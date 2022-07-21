@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Edicion de Formacion</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($formacion, ['route'=>['admin.formacions.update', $formacion], 'method'=>'put']) !!}
                @include('admin.formacions.partials.form')
                {!! Form::submit('Actualizar Formacion', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop