{{-- @livewire('admin.carreras-create')

<div class="form-group">
    {!! Form::label('nombre_materia', 'Nombre Materia:') !!}
    {!! Form::text('nombre_materia', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la Materia']) !!}
    @error('nombre_materia')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('sigla', 'Sigla:') !!}
    {!! Form::text('sigla', null, ['class' => 'form-control', 'placeholder' => 'Escriba la Sigla']) !!}
    @error('sigla')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Escriba la descripcion']) !!}
    @error('descripcion')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div> --}}

{{-- <div class="form-group">
    {!! Form::label('facultad_id', 'ID de Carrera') !!}
    {!! Form::select('facultad_id', $facultads, null, ['class' => 'form-control']) !!}
     @error('facultad_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div> --}}
<div class="form-group">
    {!! Form::label('carrera_id', 'ID de Carrera') !!}
    {!! Form::select('carrera_id', $carreras, null, ['class' => 'form-control', 'placeholder' => 'Escoja la materia']) !!}
     @error('carrera_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('nombre_materia', 'Nombre Materia:') !!}
    {!! Form::text('nombre_materia', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la Materia']) !!}
    @error('nombre_materia')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('sigla', 'Sigla:') !!}
    {!! Form::text('sigla', null, ['class' => 'form-control', 'placeholder' => 'Escriba la Sigla']) !!}
    @error('sigla')
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

