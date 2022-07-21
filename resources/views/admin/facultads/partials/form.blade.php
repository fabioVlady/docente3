<div class="form-group">
    {!! Form::label('nombre_facultad', 'Nombre de la Facultad') !!}
    {!! Form::text('nombre_facultad', null, ['class' => 'form-control', 'placeholder' => 'Escriba el Nombre de la Facultad']) !!}
    @error('nombre_facultad')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la Descripcion']) !!}
    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('ubicacion', 'Ubicacion') !!}
    {!! Form::text('ubicacion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la Ubicacion']) !!}
    @error('ubicacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
