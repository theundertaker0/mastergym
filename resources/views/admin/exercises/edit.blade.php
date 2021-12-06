@extends('adminlte::page')
@section('title', 'Nuevo Ejercicio')
@section('css')
    <link rel="stylesheet" href="{{asset('/custominputfile/css/custominputfile.min.css')}}" type="text/css" />
@stop
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Editar Ejercicio</h1>
        </div>
    </div>
@stop
@section('content')
    <form action="{{route('admin.exercises.update', $exercise)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 border rounded py-3 px-2">
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Nombre:
                        </strong>

                        <input id="name" type="text" name="name" class="form-control" placeholder="Nombre del ejercicio" value="{{$exercise->name}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Imagen:
                        </strong>
                        <input id="img" type="file" name="img" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            URL Video:
                        </strong>
                        <input id="video" type="text" name="video" class="form-control" placeholder="Enlace al video" value="{{$exercise->video}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Grupo muscular:
                        </strong>
                        <select id="muscle_id" name="muscle_id" class="custom-select">
                            @foreach($muscles as $m)
                                @if($m->id == $exercise->muscle_id)
                                <option value="{{$m->id}}" selected>{{$m->name}}</option>
                                @else
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Descripción:
                        </strong>
                        <textarea id="description" name="description" class="form-control">{{$exercise->description}}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-center">
                        <a class="btn btn-danger" href="{{route('admin.exercises.index')}}">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@stop
@section('js')
    <script src="{{asset('custominputfile/js/custominputfile.min.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        $('#img').customFile({
            type : 'image',
            allowed: ["jpg", "png", "bmp", "jpeg", "webp"],
            preview : {
                display: true, // Default: true
                maxWidth: 100  // if cropSize were wider than maxWidth, only preview would be redimensioned (real crop area would not)
            },
            multiple: false,
            maxFiles: 1,
            maxMB: 2,
            messages: {
                errorType : 'Tipo de archivo no admitido',
                errorMaxMB : 'Imagen demasiado grande el máximo permitido es de 2MB',
                errorMaxFiles : 'Solo puede cargar una imagen'
            },
            progressBar : {
                active : true, // Set false if you do not want a progress bar at all
                appendTo : $('body'),  // which node you want to append current progressBar to
                removeAfterComplete : true,
            },
            filePicker : "<h3>Arrastra tu imagen aquí</h3><p>o puedes dar clic para seleccionarla</p><div class = 'cif-icon-picker'></div>",
            width : '100%'
        });

        CKEDITOR.replace( 'description' );
    </script>

@Stop

