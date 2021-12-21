@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('title', 'Rutinas')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Listado de Rutinas</h1>
        </div>
        <div class="col-12 pull-left">
            <a class="btn btn-success" href="{{route('admin.routines.create')}}">Agregar Rutina</a>
        </div>
    </div>
@stop
@section('content')
    <div class="row mt-4">
      <div class="col-12 text-center">

          <table id="dtRoutines" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
              <tbody>
              @foreach($routines as $routine)
                  <tr>
                      <td>{{$routine->name}}</td>
                      <td>
                          <form action="{{route('admin.routines.destroy', $routine)}}" method="POST">
                              @csrf
                              @method('delete')
                              <a href="{{route('admin.routines.show', $routine)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                              <a href="{{route('admin.routines.edit', $routine)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                              <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          </form>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
      </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {

            $('#dtRoutines').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            });

            @if($message = Session('message'))
            Swal.fire({
                position: 'center',
                type: 'success',
                title: '{{$message}}',
            });
    @endif
        });
    </script>
@Stop
