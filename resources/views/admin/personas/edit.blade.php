@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Editar Persona</h1>
@stop

@section('content')
    @php
        $email = 'App\Models\User'::all()->where('id',$persona->user_id)->first()->email;
    @endphp
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($persona,['route' => ['admin.personas.update', $persona], 'method' => 'put']) !!}
                
                @include('admin.personas.partials.form')
                
                {!! Form::submit('Actualizar Persona', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
@stop