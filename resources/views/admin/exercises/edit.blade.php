@extends('adminlte::page')
@section('title', 'Nuevo Ejercicio')
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

@Stop
