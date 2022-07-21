@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <h1>Reporte Docentes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="docente">
                <thead>
                    <tr>
                        <th>item</th>
                        <th>nombre</th>
                        <th>carnet</th>
                        <th width="10px">accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                        <tr>
                            <td>{{$docente->item}}</td>
                            <td>{{$docente->nombre}}</td>
                            <td>{{$docente->carnet}}</td>
                            <td >
                                <a class="btn btn-warning btn-sm float-right" href="{{route('admin.repoVerDocente', $docente->id)}}"><i class="far fa-eye">Materias</i></a>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="~select2/dist/css/select2.css"> --}}
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