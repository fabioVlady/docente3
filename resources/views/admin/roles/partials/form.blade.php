<div class="form-group">
    {!! Form::label('name', 'Nombre del Rol') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el Nombre del Rol']) !!}
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<h2 class="h3">Lista de Permisos</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->description}}
        </label>
    </div>
@endforeach