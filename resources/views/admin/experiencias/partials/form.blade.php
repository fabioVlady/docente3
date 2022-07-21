<div class="form-group">
    {!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
    {!! Form::text('nombre_empresa', null, ['class' => 'form-control', 'placeholder' => 'Escriba el Nombre de la Empresa']) !!}
    @error('nombre_empresa')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('tipo_institucion', 'Tipo de la Institucion') !!}
    {!! Form::text('tipo_institucion', null, ['class' => 'form-control', 'placeholder' => 'Escriba el tipo de la Institucion']) !!}
    @error('tipo_institucion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('cargo', 'Cargo') !!}
    {!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Escriba el cargo que cumplia']) !!}
    @error('cargo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('funciones', 'Funciones') !!}
    {!! Form::textarea('funciones', null, ['class' => 'form-control', 'placeholder' => 'Escriba las Funciones que cumplia']) !!}
    @error('funciones')
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