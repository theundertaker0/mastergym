@extends('adminlte::page')
@section('title', 'ver rutina')
@section('content_header')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <h1>{{$routine->name}}</h1>
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
                    {!! $routine->description !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">Ejercicios</h4>
                </div>
                <hr>
                @foreach($exercises as $e)
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card mb-3 h-100">
                            @if($e->img && $e->img != "")
                                <img src="{{asset('exercises/img/'.$e->img)}}" alt="" class="card-img-top">
                            @else
                                <img src="{{asset('img/dummyexercise.jpg')}}" alt="" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center" style="width: 100%;">{{$e->name}}</h5>
                                <p class="card-text">{!! $e->description !!}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-center"><small class="text-muted">Series:{{$e->pivot->series?$e->pivot->series:"NA"}} - Repeticiones:{{$e->pivot->repetitions?$e->pivot->repetitions:"NA"}}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-12 mt-2">
                <div class="form-group text-center">
                    <a class="btn btn-danger" href="{{route('admin.routines.index')}}"><i class="fas fa-reply"></i> Regresar</a>
                    <a href="{{route('admin.routines.download',$routine->id)}}" class="btn btn-success"><i class="fas fa-save"></i> Descargar</a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

@Stop
