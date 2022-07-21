<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /** 
        * Establecer los márgenes del PDF en 0
        * por lo que la imagen de fondo cubrirá toda la página.
        **/
        @page {
            margin: 0cm 0cm;
        }

        /**
        * Define los márgenes reales del contenido de tu PDF
        * Aquí arreglarás los márgenes del encabezado y pie de página
        * De tu imagen de fondo.
        **/
        body {
            margin-top:    3.5cm;
            margin-bottom: 1cm;
            margin-left:   1cm;
            margin-right:  1cm;
        }

        /** 
        * Defina el ancho, alto, márgenes y posición de la marca de agua.
        **/
        #watermark {
            position: fixed;

                /** 
                    Establece una posición en la página para tu imagen
                    Esto debería centrarlo verticalmente
                **/
                
                bottom:   10cm;
                left:     5.5cm;

                /** Cambiar las dimensiones de la imagen **/
                width:    8cm;
                height:   8cm;

                /** Tu marca de agua debe estar detrás de cada contenido **/
                z-index:  -1000;
        }
        thead:before, thead:after { 
            display: none; 
        } 
        tbody:before, tbody:after { 
            display: none; 
        }
        @page { 
            margin: 40px 10px; 
        }
        #header { 
            position: fixed; 
            left: 0px; 
            top: -32px; 
            right: 0px; 
            height: 40px; 
            background-color: orange; 
            text-align: center; 
            z-index: -1000;
        }
        #footer { 
            position: fixed; 
            left: 0px; 
            bottom: -32px; 
            right: 0px; 
            height: 30px; 
            background-color: lightblue; 
            text-align: center; 
        }      
    </style>
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css ">
    
</head>
<body>
    <div id="header"><img src="{{ public_path("storage/logos/plantel3.png") }}"></div>
<div id="footer">Pie de Página</div>
    <div id="watermark">
        {{-- <img src="{{ Storage::url($persona->url) }}" height="100%" width="100%" /> --}}
        <img src="{{ public_path("storage/logos/plantel2.png") }}" alt="" height="100%" width="100%">
    </div>
    <br>
    <div class="container">
        {!! Form::model($persona,['route' => ['admin.update',$persona], 'files' => true, 'method' => 'put']) !!}

        <div class="row">
            <div class="col-4">
                @if ($persona->url)
                {{-- <img src="{{ public_path("storage/images/".$user->profile_pic) }}" alt="" style="width: 150px; height: 150px;"> --}}
                    <img id="picture" class="img-fluid rounded-full img-circle" height="50px" width="100px" src="{{ public_path("storage/".$persona->url) }}">
                    {{-- <img id="picture" class="img-fluid rounded-full img-circle" height="50px" src="{{ Storage::url($persona->url) }}"/> --}}
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
    <div class="container">
        <div class="card">
            <div class="table">
                <thead>
                    <tr>
                        <th>Cursos de Idiomas</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($curso_idiomas)
                        <tr>
                            <td>No tiene Datos en Formaciones</td>
                        </tr>
                    @endif
                    @foreach ($curso_idiomas as $curso_idioma)
                    <tr>
                        <td>{{ $curso_idioma->id }}</td>
                        {{-- <td>{{ $materia->nombre_materia }}</td> --}}

                    </tr>
                    @endforeach
                </tbody>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="table">
                <thead>
                    <tr>
                        <th>Cursos Extras</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($curso_extras)
                        <tr>
                            <td>No tiene Datos en Formaciones</td>
                        </tr>
                    @endif
                    @foreach ($curso_extras as $curso_extra)
                    <tr>
                        <td>{{ $curso_extra->id }}</td>
                        {{-- <td>{{ $materia->nombre_materia }}</td> --}}

                    </tr>
                    @endforeach
                </tbody>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="table">
                <thead>
                    <tr>
                        <th>Formaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($formacions)
                        <tr>
                            <td>No tiene Datos en Formaciones</td>
                        </tr>
                    @endif
                    @foreach ($formacions as $formacion)
                    <tr>
                        <td>{{ $formacion->id }}</td>
                        {{-- <td>{{ $materia->nombre_materia }}</td> --}}

                    </tr>
                    @endforeach
                </tbody>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="table">
                <thead>
                    <tr>
                        <th>Experiencias</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiencias as $experiencia)
                    <tr>
                        <td>{{ $experiencia->id }}</td>
                        {{-- <td>{{ $materia->nombre_materia }}</td> --}}

                    </tr>
                    @endforeach
                </tbody>
                
            </div>
        </div>
    </div>
</body>
</html>