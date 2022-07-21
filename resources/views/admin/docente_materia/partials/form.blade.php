@if ($var)
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Select Facultad:</label>
                {!! Form::select('facultad_id', $facultads, $var_fac, ['class' => 'form-control','placeholder'=>'Escoja la facultad']) !!}
                @error('facultad_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Select Carrera:</label>
                {!! Form::select('carrera_id', $carreras, $var_car, ['class'=>'form-control','disabled']) !!}
                @error('carrera_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Select Materia:</label>
                {!! Form::select('materia_id', $materias, null, ['class'=>'form-control','disabled']) !!}
                @error('materia_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('periodo', 'Periodo:') !!}
                {{-- {!! Form::date('periodo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de inicio']) !!} --}}
                {!! Form::text('periodo', null, ['class'=>'form-control']) !!}
                @error('periodo')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('inicio', 'Fecha Inicio:') !!}
                {!! Form::date('inicio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de inicio']) !!}
                @error('inicio')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('fin', 'Fecha Fin:') !!}
                {!! Form::date('fin', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de Finalizacion']) !!}
                @error('fin')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('dia1', 'dia 1 de clase:') !!}
                {{-- {!! Form::select('dia1', array_pluck($dias, $dias), null, ['class'=>'form-control','placeholder'=>'elija el dia']) !!} --}}
                {!! Form::select('dia1', array('Lunes' => 'Lunes','Martes' => 'Martes','Miercoles' => 'Miercoles','Jueves' => 'Jueves','Viernes' => 'Viernes','Sabado' => 'Sabado'), null, ['class'=>'form-control','placeholder'=>'elija el dia'])!!}
                @error('dia1')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('hora_dia1', 'Hora:') !!}
                {!! Form::time('hora_dia1', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la hora de inicio']) !!}
                @error('hora_dia1')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('dia2', 'dia 2 de clase:') !!}
                {!! Form::select('dia2', array('Lunes' => 'Lunes','Martes' => 'Martes','Miercoles' => 'Miercoles','Jueves' => 'Jueves','Viernes' => 'Viernes','Sabado' => 'Sabado'), null, ['class'=>'form-control','placeholder'=>'elija el dia'])!!}
                @error('dia2')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('hora_dia2', 'Hora:') !!}
                {!! Form::time('hora_dia2', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la hora de inicio']) !!}
                @error('hora_dia2')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('primer_parcial', 'Fecha 1er parcial:') !!}
                {!! Form::date('primer_parcial', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del 1er parcial']) !!}
                @error('primer_parcial')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('segundo_parcial', 'Fecha 2do parcial:') !!}
                {!! Form::date('segundo_parcial', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del 2do parcial']) !!}
                @error('segundo_parcial')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('examen_final', 'Fecha examen final:') !!}
                {!! Form::date('examen_final', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del examen final']) !!}
                @error('examen_final')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div> 
        </div>
    </div>

    
    
    
@else
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Select Facultad:</label>
                {!! Form::select('facultad_id', $facultads, null, ['class' => 'form-control','placeholder'=>'Escoja la facultad']) !!}
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Select Carrera:</label>
                <select name="carrera_id" class="form-control">
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Select Materia:</label>
                <select name="materia_id" class="form-control">
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('periodo', 'Periodo:') !!}
                {{-- {!! Form::date('periodo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de inicio']) !!} --}}
                {!! Form::text('periodo', null, ['class'=>'form-control']) !!}
                @error('periodo')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('inicio', 'Fecha Inicio:') !!}
                {!! Form::date('inicio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de inicio']) !!}
                @error('inicio')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('fin', 'Fecha Fin:') !!}
                {!! Form::date('fin', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha de Finalizacion']) !!}
                @error('fin')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('dia1', 'dia 1 de clase:') !!}
                {{-- {!! Form::select('dia1', array_pluck($dias, $dias), null, ['class'=>'form-control','placeholder'=>'elija el dia']) !!} --}}
                {!! Form::select('dia1', array('Lunes' => 'Lunes','Martes' => 'Martes','Miercoles' => 'Miercoles','Jueves' => 'Jueves','Viernes' => 'Viernes','Sabado' => 'Sabado'), null, ['class'=>'form-control','placeholder'=>'elija el dia'])!!}
                @error('dia1')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('hora_dia1', 'Hora:') !!}
                {!! Form::time('hora_dia1', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la hora de inicio']) !!}
                @error('hora_dia1')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('dia2', 'dia 2 de clase:') !!}
                {!! Form::select('dia2', array('Lunes' => 'Lunes','Martes' => 'Martes','Miercoles' => 'Miercoles','Jueves' => 'Jueves','Viernes' => 'Viernes','Sabado' => 'Sabado'), null, ['class'=>'form-control','placeholder'=>'elija el dia'])!!}
                @error('dia2')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('hora_dia2', 'Hora:') !!}
                {!! Form::time('hora_dia2', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la hora de inicio']) !!}
                @error('hora_dia2')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('primer_parcial', 'Fecha 1er parcial:') !!}
                {!! Form::date('primer_parcial', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del 1er parcial']) !!}
                @error('primer_parcial')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('segundo_parcial', 'Fecha 2do parcial:') !!}
                {!! Form::date('segundo_parcial', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del 2do parcial']) !!}
                @error('segundo_parcial')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('examen_final', 'Fecha examen final:') !!}
                {!! Form::date('examen_final', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del examen final']) !!}
                @error('examen_final')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div> 
        </div>
    </div>
@endif

