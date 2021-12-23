@extends('adminlte::page')
@section('title', 'ver Entrenamiento')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>{{$training->name}}</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 border rounded">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">Descripción</h4>
                </div>
                <hr>
                <div class="col-12">
                    {!! $training->description !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">Rutinas</h4>
                </div>
                <hr>
                @foreach($routines as $r)
                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{route('admin.routines.show',$r)}}">
                        <div class="card mb-3 h-100">
                            <img src="{{asset('img/rutina.jpg')}}" alt="" class="card-img-top">
                            <div class="card-body">
                               <h5 class="card-title text-center" style="width: 100%;">{{$r->name}}</h5>

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
@section('js')

@Stop
