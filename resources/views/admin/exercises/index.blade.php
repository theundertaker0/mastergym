@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Ejercicios')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Listado de Ejercicios</h1>
        </div>
        <div class="col-12 pull-left">
            <a class="btn btn-success" href="{{route('admin.exercises.create')}}">Agregar Ejercicios</a>
        </div>
    </div>
@stop
@section('content')
    <div class="row mt-4">
      <div class="col-12 text-center">
          @if($message = Session('message'))
              <div class="alert alert-success">{{$message}}</div>
          @endif
          <table id="dtExercises" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
              <tbody>
              @foreach($exercises as $exercise)
                  <tr>
                      <td><img src="{{asset('exercises/img/'.$exercise->img)}}" alt="" style="max-width: 120px"></td>
                      <td>{{$exercise->name}}</td>
                      <td>
                          <form action="{{route('admin.exercises.destroy', $exercise)}}" method="POST">
                              @csrf
                              @method('delete')
                              <a href="{{route('admin.exercises.show', $exercise)}}" class="btn btn-sm btn-primary">Ver</a>
                              <a href="{{route('admin.exercises.edit', $exercise)}}" class="btn btn-sm btn-success">Editar</a>
                              <button type="submit" class="btn btn-sm btn-danger">Elimnar</button>
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

            $('#dtExercises').DataTable({
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
        });
    </script>
@Stop
