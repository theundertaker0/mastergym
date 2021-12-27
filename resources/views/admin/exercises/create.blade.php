@extends('adminlte::page')
@section('title', 'Nuevo Ejercicio')
@section('css')

    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

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
                <div class="col-12 text-center">
                    <div class="form-group">
                        <strong>
                            Imagen:
                        </strong>
                        <input type="file" name = "img" id = "img">
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
    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script>

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/es.js"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
       $('#img').fileinput({
          language : 'es',
           showUpload : false,
           browseOnZoneClick : true,
           allowedFileExtensions: ["jpg", "jpeg", "bmp", "png"],
           maxFileSize: 2048,
       });

        CKEDITOR.replace( 'description' );
       CKEDITOR.on('instanceReady', function (ev) {
           ev.editor.dataProcessor.htmlFilter.addRules( {
               elements : {
                   img: function( el ) {
                       // Add bootstrap "img-responsive" class to each inserted image
                       el.addClass('img-fluid');

                       // Remove inline "height" and "width" styles and
                       // replace them with their attribute counterparts.
                       // This ensures that the 'img-responsive' class works
                       var style = el.attributes.style;

                       if (style) {
                           // Get the width from the style.
                           var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                               width = match && match[1];

                           // Get the height from the style.
                           match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                           var height = match && match[1];

                           // Replace the width
                           if (width) {
                               el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                               el.attributes.width = width;
                           }

                           // Replace the height
                           if (height) {
                               el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                               el.attributes.height = height;
                           }
                       }

                       // Remove the style tag if it is empty
                       if (!el.attributes.style)
                           delete el.attributes.style;
                   }
               }
           });
       });
    </script>

@Stop
