<div class="form-group">
    {!! Form::label('nivel_estudio', 'Nivel de Estudio') !!}
    {!! Form::text('nivel_estudio', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nivel de estudio']) !!}
    @error('nivel_estudio')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('institucion', 'Nombre de la Institucion') !!}
    {!! Form::text('institucion', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la Institucion']) !!}
    @error('institucion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
    {!! Form::date('fecha_inicio', null, ['class'=>'form-control']) !!}
    @error('fecha_inicio')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha Fin') !!}
    {!! Form::date('fecha_fin', null, ['class'=>'form-control']) !!}
    @error('fecha_fin')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>