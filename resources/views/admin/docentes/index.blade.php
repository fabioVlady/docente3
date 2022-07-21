@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <a class="btn btn-success float-right" href="{{route('admin.docentes.create')}}">Agregar Docente</a>
    <h1>Listado Docente</h1>
@stop

@section('content')
     @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="docente">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>grado</th>
                        <th>tipo</th>
                        <th width="10px">accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                        <tr>
                            <td>{{$docente->id}}</td>
                            <td>{{$docente->grado}}</td>
                            <td>{{$docente->tipo}}</td>
                            <td >
                                <form action="{{route('admin.docentes.destroy',$docente)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm float-right" type="submit"><i class="far fa-trash-alt"></i></button>
                                </form>
                                <a class="btn btn-warning btn-sm float-right" href="{{route('admin.docentes.edit',$docente)}}"><i class="far fa-edit"></i></a>
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
        $('#docente').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@stop