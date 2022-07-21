<div class="form-group">
    {!! Form::label('item', 'Item:') !!}
    {!! Form::text('item', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nro de Item']) !!}
    @error('item')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('grado', 'Grado del docente:') !!}
    {!! Form::text('grado', null, ['class' => 'form-control', 'placeholder' => 'Escriba grado del docente']) !!}
    @error('grado')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('tipo', 'Tipo docente:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'Escriba el tipo de docente']) !!}
    @error('tipo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('persona_id', 'id de la persona') !!}
    {!! Form::select('persona_id', $personas, null, ['class'=>'form-control','placeholder'=>'Ingrese el ci del docente','style'=>'width: 100%']) !!}
    @error('persona_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
