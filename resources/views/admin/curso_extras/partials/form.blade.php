<div class="form-group">
    {!! Form::label('nombre_curso', 'Nombre Curso:') !!}
    {!! Form::text('nombre_curso', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Curso']) !!}
    @error('nombre_curso')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('institucion', 'Nombre Institucion:') !!}
    {!! Form::text('institucion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Institucion']) !!}
    @error('institucion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('horas', 'Numero de Horas') !!}
    {!! Form::number('horas', null, ['class' => 'form-control']) !!}
    @error('horas')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
    {!! Form::date('fecha_inicio',null, ['class' => 'form-control']) !!}
    @error('fecha_inicio')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha de Fin:') !!}
    {!! Form::date('fecha_fin',null, ['class' => 'form-control']) !!}
    @error('fecha_fin')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>