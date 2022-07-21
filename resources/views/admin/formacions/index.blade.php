@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <a class="btn btn-success float-right" href="{{route('admin.formacions.create')}}">Agregar Formacion</a>
    <h1>Listado de Formaciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="formar">
                <thead>
                    <tr>
                        <th>nivel</th>
                        <th>institucion</th>
                        <th>fecha ini</th>
                        <th>accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formacions as $formacion)
                        <tr>
                            <td>{{$formacion->id}}</td>
                            <td>{{$formacion->institucion}}</td>
                            <td>{{$formacion->fecha_inicio}}</td>
                            <td >
                                <form action="{{route('admin.formacions.destroy',$formacion)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm float-right" type="submit"><i class="far fa-trash-alt"></i></button>
                                </form>
                                <a class="btn btn-warning btn-sm float-right" href="{{route('admin.formacions.edit',$formacion)}}"><i class="far fa-edit"></i></a>
                            </td>
                            
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('js')
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#formar').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@stop