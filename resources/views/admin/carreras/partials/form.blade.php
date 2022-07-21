<div class="form-group">
    {!! Form::label('nombre_carrera', 'Nombre Carrera:') !!}
    {!! Form::text('nombre_carrera', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la Carrera']) !!}
    @error('nombre_carrera')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la descripcion']) !!}
    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('ubicacion', 'ubicacion:') !!}
    {!! Form::text('ubicacion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la ubicacion']) !!}
    @error('ubicacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('facultad_id', 'id de la facultad') !!}
    {!! Form::select('facultad_id', $facultads, null, ['class'=>'form-control','placeholder'=>'Ingrese nombre de la facultad','style'=>'width: 100%']) !!}
    @error('facultad_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
