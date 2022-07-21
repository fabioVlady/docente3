<div class="form-group">
    {!! Form::label('titulo', 'Titulo del Libro') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Escriba el titulo del libro']) !!}
    @error('titulo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('editorial', 'Nombre de la Editorial') !!}
    {!! Form::text('editorial', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la Editorial']) !!}
    @error('editorial')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_publicacion', 'Fecha de Publicacion') !!}
    
    {!! Form::selectRange('gestion_publicacion', $year, 1950, null, ['class'=>'form-control']) !!}
    @error('fecha_publicacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_publicacion', 'Fecha de Publicacion') !!}
    {!! Form::date('fecha_publicacion', null, ['class'=>'form-control']) !!}
    @error('fecha_publicacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('edicion', 'Edicion') !!}
    {!! Form::text('edicion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la Edicion']) !!}
    @error('edicion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>