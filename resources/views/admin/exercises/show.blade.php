@extends('adminlte::page')
@section('title', 'Nuevo Ejercicio')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>{{$exercise->name}}</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 border rounded py-3 px-2">
        <div class="col-12">
            <img src="{{asset('exercises/img/'.$exercise->img)}}" alt="" class="img-fluid">

        </div>
            <div class="col-12">
                <iframe width="560" height="315" src="{{$exercise->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        <div class="col-12">
            <strong>
                Grupo muscular:
            </strong>
            {{$muscle->name}}
        </div>
        <div class="col-12">
            {{$exercise->description}}
        </div>
        <div class="col-12">
            <div class="form-group text-center">
                <a class="btn btn-danger" href="{{route('admin.exercises.index')}}">Regresar</a>
            </div>
        </div>
    </div>
    </div>
@stop
@section('js')

@Stop
