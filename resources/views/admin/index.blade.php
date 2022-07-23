@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <a href="{{ route('admin.pdf') }}" class="btn btn-danger float-right">Generar PDF</a>
    <h1>Datos Personales</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="container">
        {!! Form::model($persona,['route' => ['admin.update',$persona], 'files' => true, 'method' => 'put']) !!}

        <div class="row">
            <div class="col-4">
                @if ($persona->url)
                    {{-- <img id="picture" class="img-fluid rounded-full img-circle" src="{{ Storage::url($persona->url) }}"/> --}}
                    <img id="picture" class="img-fluid rounded-full img-circle" src="{{$persona->url}}"/>
                @else
                    <img id="picture" class="img-fluid rounded-full img-circle" src="https://th.bing.com/th/id/R.ac8b08dd3be8772b324e2ff654e18ade?rik=t%2bA25hfzOQv%2fAA&riu=http%3a%2f%2fassets.stickpng.com%2fimages%2f585e4bd7cb11b227491c3397.png&ehk=CuHoUUtbwcv%2fPSZZCmR%2bDEInH5y03ZqbWsSk0S3FAz4%3d&risl=&pid=ImgRaw&r=0"/>
                @endif
                <div class="form-group">
                    {!! Form::label('file', 'Selecciona tu Foto') !!}
                    {!! Form::file('file', ['class'=>'form-control-file', 'accept'=>'image/*' ]) !!}
                </div>
            </div>                    
            <div class="col-8">
                <div class="form-group">
                    {!! Form::label('perfil', 'Una Breve descripcion para tu Perfil') !!}
                    {!! Form::textarea('perfil', null, ['class'=>'form-control','rows'=>3]) !!}
                    @error('perfil')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('nombres', 'Nombres') !!}
                                {!! Form::text('nombres', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre de la persona']) !!}
                                @error('nombres')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('paterno', 'Paterno') !!}
                                {!! Form::text('paterno', null, ['class' => 'form-control','placeholder' => 'Ingrese el Paterno de la persona']) !!}
                                @error('paterno')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('materno', 'Materno') !!}
                                {!! Form::text('materno', null, ['class' => 'form-control','placeholder' => 'Ingrese el Materno de la persona']) !!}
                                @error('materno')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                {!! Form::label('ci', 'Cedula de Identidad') !!}
                                {!! Form::number('ci', null, ['class' => 'form-control','placeholder' => 'Ingrese el CI de la persona']) !!}
                                @error('ci')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('extension', 'Extension') !!}
                                {!! Form::select('extension', $extensions, null, ['class' => 'form-control']) !!}
                                @error('extension')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('sexo', 'Genero') !!}
                                {!! Form::select('sexo', $sexos, null, ['class' => 'form-control']) !!}
                                @error('sexo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('habilidad', 'Algo breve de tus Habilidades') !!}
                        {!! Form::textarea('habilidad', null, ['class'=>'form-control','rows'=>3]) !!}
                        @error('habilidad')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    
                    
                    
                    {!! Form::submit('Actualizar Datos Personales', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}

        </div>
                    
                {{-- {{ $user->name }}<br>
                {{ $user->email }}<br>
                {{ $user->name }}<br>
                {{ $user->profile_photo_url }}<br>
                {{ $persona->nombres }}<br>
                {{ $persona->paterno }}<br>
                {{ $persona->materno }}<br>
                {{ $persona->ci }}<br>
                {{ $persona->extension }}<br>
                {{ $persona->sexo }}<br>
                {{ $persona->fecnac }}<br> --}}
           
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="~select2/dist/css/select2.css"> --}}
@stop

@section('js')
    <script>
        document.getElementById("file").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop