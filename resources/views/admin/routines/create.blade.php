@extends('adminlte::page')
@section('title', 'Nueva Rutina')

@section('css')
    <link rel="stylesheet" href="{{asset('css/cards.css')}}">
@stop

@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>Agregar Rutina</h1>
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
    <form action="{{route('admin.routines.store')}}" method="POST" id="addRoutineForm">
        @csrf
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 border rounded py-3 px-2">
                <div class="col-12">
                    <div class="form-group">
                        <strong>
                            Nombre:
                        </strong>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Nombre de la rutina">
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
                <div class="col-12 text-center my-3 border-top border-bottom">
                    <h3>Ejercicios</h3>
                </div>
               @foreach($muscles as $m)
                   @if($m->exercises->count() > 0)
                    <div class="col-12 text-center">
                        <h4>{{$m->name}}</h4>
                    </div>
                    <div class="row">
                       @foreach($m->exercises as $e)
                            <div class="col-3">
                                <label class="card">
                                    <input class="card__input" type="checkbox" name="routineExercises[]" value="{{$e->id}}"/>
                                    <div class="card__body">
                                        <div class="card__body-cover"><img class="card__body-cover-image" src="{{$e->img?asset('exercises/img/'.$e->img):asset('img/dummyexercise.jpg')}}"/><span class="card__body-cover-checkbox">
                                            <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span></div>
                                        <header class="card__body-header">
                                            <h5 class="card__body-header-title">{{$e->name}}</h5>
                                        </header>

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="Series" name="series-{{$e->id}}">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" placeholder="Reps." name="reps-{{$e->id}}">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                       @endforeach
                    </div>
                    @endif
               @endforeach
                <div class="col-12">
                    <div class="form-group text-center">
                        <a class="btn btn-danger" href="{{route('admin.routines.index')}}">Cancelar</a>
                        <button type="submit" id="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('js')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
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
@stop
