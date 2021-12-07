@extends('adminlte::page')
@section('title', 'Nuevo Ejercicio')
@section('css')
    <link rel="stylesheet" href="{{ asset('/custominputfile/css/custominputfile.min.css') }}" type="text/css" />
@stop
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Agregar Ejercicio</h1>
        </div>
        @if ($errors->any())
            <div class="col-12 alert alert-danger text-center">
                <h3>Errores en el formulario</h3>
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@stop
@section('content')
    <form action="{{ route('admin.exercises.store') }}" method="POST" enctype="multipart/form-data" class="dropzone"
        id="image-upload">
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
                <div class="col-12 text-center">
                    <div class="form-group">
                        <strong>
                            Imagen:
                        </strong>
                        <input name="imgPreview" id="imgPreview" class="" style="width: 100%">
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
                            @foreach ($muscles as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <div class="form-group">
                        <strong>
                            Descripción:
                        </strong>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div id="imgData">

                </div>
                <div class="col-12">
                    <div class="form-group text-center">
                        <a class="btn btn-danger" href="{{ route('admin.exercises.index') }}">Cancelar</a>
                        <button type="submit" id="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@stop
@section('js')
    <script src="{{ asset('custominputfile/js/custominputfile.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $('#imgPreview').customFile({
            type: 'image',
            allowed: ["jpg", "png", "bmp", "jpeg", "webp"],
            preview: {
                display: true, // Default: true
                maxWidth: 100 // if cropSize were wider than maxWidth, only preview would be redimensioned (real crop area would not)
            },
            multiple: false,
            maxFiles: 1,
            maxMB: 2,
            messages: {
                errorType: 'Tipo de archivo no admitido',
                errorMaxMB: 'Imagen demasiado grande el máximo permitido es de 2MB',
                errorMaxFiles: 'Solo puede cargar una imagen'
            },
            progressBar: {
                active: true, // Set false if you do not want a progress bar at all
                appendTo: $('body'), // which node you want to append current progressBar to
                removeAfterComplete: true,
            },
            filePicker: "<h3>Arrastra tu imagen aquí</h3><p>o puedes dar clic para seleccionarla</p><div class = 'cif-icon-picker'></div>",
            width: '100%',
            callbacks: {
                onComplete: function(app) {
                    // Function fires when all files have already read;
                    // You can access to app public properties like app.itemFileList or app.name
                    console.log('process completed. You have selected  ' + app.itemFileList.length + ' files')
                    // console.log(app);
                    // console.log(app.itemFileList[0].file);
                    // console.log(app.itemFileList[0].img.src);
                    // $('#img').attr('src', app.itemFileList[0].img.src);
                    // console.log(app.itemFileList[0].node);
                    // $('#img').val(app.itemFileList[0].img);
                    // $('#img').val(app.itemFileList[0].img.src);
                    $('#imgData').append(app.itemFileList[0].img);
                    $('#imgData img').attr('id', 'img');
                    $('#imgData img').attr('name', 'img');
                    // $('#imgData').append($.customFile.serialize('img'));
                }
            }
        });

        CKEDITOR.replace('description');
    </script>

@Stop
