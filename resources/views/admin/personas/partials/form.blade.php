<div class="form-group">
    {!! Form::label('email', 'Correo Electronico') !!}
    {{-- {!! Form::text('email', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre de la persona']) !!} --}}
    {!! Form::email('email', $email, ['class' => 'form-control','placeholder' => 'Ingrese el nombre de la persona']) !!}
    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre de la persona']) !!}
    @error('nombres')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
{{-- SLUG POR SI SIRVE
<div class="form-group">
    {!! Form::label('slug', 'SLUG') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','placeholder' => 'Ingrese el Slug de la persona', 'readonly']) !!}
</div> --}}

<div class="form-group">
    {!! Form::label('paterno', 'Paterno') !!}
    {!! Form::text('paterno', null, ['class' => 'form-control','placeholder' => 'Ingrese el Paterno de la persona']) !!}
    @error('paterno')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('materno', 'Materno') !!}
    {!! Form::text('materno', null, ['class' => 'form-control','placeholder' => 'Ingrese el Materno de la persona']) !!}
    @error('materno')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ci', 'Cedula de Identidad') !!}
    {!! Form::number('ci', null, ['class' => 'form-control','placeholder' => 'Ingrese el CI de la persona']) !!}
    {{-- {!! Form::text('ci', null, ['class' => 'form-control','placeholder' => 'Ingrese el CI de la persona']) !!} --}}
    @error('ci')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('extension', 'Extension') !!}
    {!! Form::select('extension', $extensions, 2, ['class' => 'form-control']) !!}
    @error('extension')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('sexo', 'Genero') !!}
    {!! Form::select('sexo', $sexos, null, ['class' => 'form-control']) !!}
    @error('sexo')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecnac', 'Fecha de Nacimiento') !!}
    {!! Form::date('fecnac', null, ['class' => 'form-control']) !!}
    @error('fecnac')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
{{-- <div class="form-group">
    {!! Form::label('user_id', 'ID del Usuario') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control','placeholder' => 'Ingrese la id del Usuario de la persona']) !!}
    @error('user_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}