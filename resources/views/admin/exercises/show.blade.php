@extends('adminlte::page')
@section('title', 'ver ejercicio ')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>{{$exercise->name}}</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                @if($exercise->img && $exercise->img != "")
                    <img src="{{asset('exercises/img/'.$exercise->img)}}" alt="" class="card-img-top">
                @else
                    <img src="{{asset('img/dummyexercise.jpg')}}" alt="" class="card-img-top">
                @endif

                <ul class="list-group list-group-flush"></ul>
                <li class="list-group-item">
                    <h5 card="card-title">Video</h5>
                    @if($video)
                        {!! $video !!}
                    @else
                        <p>El ejercicio no cuenta con enlace de video válido</p>
                    @endif
                </li>
                <li class="list-group-item">
                    <h5 card="card-title">Grupo Muscular</h5>
                    <p>{{$muscle->name}}</p>
                </li>
                <li class="list-group-item">
                    <h5 card="card-title">Descripción</h5>
                    {!! $exercise->description !!}
                </li>
            </div>



        <div class="col-12 mt-2">
            <div class="form-group text-center">
                <a class="btn btn-danger" href="{{route('admin.exercises.index')}}">Regresar</a>
            </div>
        </div>
    </div>
    </div>
@stop
@section('js')

@Stop
