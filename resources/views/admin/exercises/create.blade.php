@extends('adminlte::page')
@section('title', 'Nuevo Ejercicio')
@section('css')
    <link rel="stylesheet" href="{{asset('css/custominputfile.min.css')}}" type="text/css" />
@stop
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Agregar Ejercicios</h1>
        </div>
        @if($errors->any())
            <div class="col-12 alert alert-danger text-center">
                        <h3>Errores en el formulario</h3>
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop
@section('content')
    <form action="{{route('admin.exercises.store')}}" method="POST" enctype="multipart/form-data"  class="dropzone" id="image-upload">
        @csrf
		<div>
                    <h3 class="text-center">Upload Multiple Image By Click On Box</h3>
                </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 border rounded py-3 px-2">
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Nombre:
                        </strong>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Nombre del ejercicio">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input name="img" id="img" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            URL Video:
                        </strong>
                        <input id="video" type="text" name="video" class="form-control" placeholder="Enlace al video">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Grupo muscular:
                        </strong>
                        <select id="muscle_id" name="muscle_id" class="custom-select">
                            @foreach($muscles as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Descripción:
                        </strong>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-center">
                        <a class="btn btn-danger" href="{{route('admin.exercises.index')}}">Cancelar</a>
                        <button type="submit" id="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@stop
@section('js')
    <script src="{{asset('js/custominputfile.min-es.js')}}"></script>
    <script>
        $('#img').customFile({
            type : 'image',
            preview : {
                display: true, // Default: true
                maxWidth: 100  // if cropSize were wider than maxWidth, only preview would be redimensioned (real crop area would not)
            },
            multiple: false,
            maxFiles: 1,
            progressBar : {
                active : true, // Set false if you do not want a progress bar at all
                appendTo : $('body'),  // which node you want to append current progressBar to
                removeAfterComplete : true,
            },
        });
    </script>

@Stop
