@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('title', 'Ejercicios')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Listado de Ejercicios</h1>
        </div>
        <div class="col-12 pull-left">
            <a class="btn btn-success" href="{{route('admin.exercises.create')}}">Agregar Ejercicio</a>
        </div>
    </div>
@stop
@section('content')
    <div class="row mt-4">
      <div class="col-12 text-center">

          <table id="dtExercises" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Músculo</th>
                <th>Acciones</th>
            </tr>
            </thead>
              <tbody>
              @foreach($exercises as $exercise)
                  <tr>
                      <td>
                          @if($exercise->img && $exercise->img != "")
                            <img src="{{asset('exercises/img/'.$exercise->img)}}" alt="" style="max-width: 100px" class="rounded">
                          @else
                              <img src="{{asset('img/dummyexercise.jpg')}}" alt="" style="max-width: 120px" class="rounded">
                          @endif
                      </td>
                      <td>{{$exercise->name}}</td>
                      <td>{{$exercise->muscle->name}}</td>
                      <td>
                          <form action="{{route('admin.exercises.destroy', $exercise)}}" method="POST">
                              @csrf
                              @method('delete')
                              <a href="{{route('admin.exercises.show', $exercise)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                              <a href="{{route('admin.exercises.edit', $exercise)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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
