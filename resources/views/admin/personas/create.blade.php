@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Crear Nueva Persona</h1>
@stop

@section('content')
    @php
        $email=null
    @endphp
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route' => 'admin.personas.store']) !!}
                @include('admin.personas.partials.form')
                {!! Form::submit('Crear Persona', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#nombres").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection

