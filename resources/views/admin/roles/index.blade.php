@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <a class="btn btn-success float-right" href="{{route('admin.roles.create')}}">Agregar Rol</a>
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            
            <table class="table table-striped" id="roleTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Rol</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            {{-- <td> <img src="{{$role->profile_photo_url}}" alt=""> </td> --}}

                            <td width="10px">
                                <form class="float-right" action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                                <a class="btn btn-warning btn-sm float-right" href="{{route('admin.roles.edit', $role)}}"><i class="far fa-edit"></i></a>

                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

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
        $('#roleTable').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@stop