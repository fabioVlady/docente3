<div>
        <div class="form-group">
            {!! Form::label('facultad_id', 'Escoge tu facultad') !!}
            {{-- <input type="text" wire:model="selectedFacultad"> --}}
            {!! Form::select('facultad_id', $facultads, null, ['class' => 'form-control','wire:model' =>'selectedFacultad']) !!}
            
            {{-- <select wire:model="selectedFacultad" class="form-control" id="facultad_id" name="facultad_id">
                <option value="0">Escoja la Facultad</option>
                    
                @foreach ($facultads as $facultad)
                    <option value="{{ $facultad->id }}">{{ $facultad->nombre_facultad }}</option>
                @endforeach
            </select> --}}
            @error('facultad_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        @if (!is_null($selectedFacultad))
            <div class="form-group">
                {!! Form::label('carrera_id', 'Escoge tu Carrera') !!}
                {!! Form::select('carrera_id', $carreras, null, ['class' => 'form-control','wire:model' =>'selectedCarrera']) !!}
                
                {{-- <select class="form-control" id="carrera_id" name="carrera_id">
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre_carrera }}</option>
                    @endforeach
                </select> --}}
                @error('carrera_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        @endif
        
</div>
