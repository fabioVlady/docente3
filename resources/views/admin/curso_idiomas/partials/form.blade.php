<div class="form-group">
    {!! Form::label('idioma', 'Nombre Idioma:') !!}
    {!! Form::text('idioma', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Idioma']) !!}
    @error('idioma')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('lectura', 'Lectura:') !!}
    {!! Form::select('lectura', $nivel, null, ['class' => 'form-control']) !!}
    @error('lectura')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('escritura', 'Escritura:') !!}
    {!! Form::select('escritura', $nivel, null, ['class' => 'form-control']) !!}
    @error('escritura')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('comprension', 'Comprension:') !!}
    {!! Form::select('comprension', $nivel, null, ['class' => 'form-control']) !!}
    @error('comprension')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('conversacion', 'Conversacion:') !!}
    {!! Form::select('conversacion', $nivel, null, ['class' => 'form-control']) !!}
    @error('conversacion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('nombre_instituto', 'Nombre Instituto:') !!}
    {!! Form::text('nombre_instituto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Instituto']) !!}
    @error('nombre_instituto')
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