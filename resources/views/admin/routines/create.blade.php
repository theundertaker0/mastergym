@extends('adminlte::page')
@section('title', 'Nueva Rutina')

@section('css')

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
    <div class="row">
        @foreach($muscles as $muscle)
        <div class="col-12 col-md-3 text-center">
            <h4>{{$muscle->name}}</h4>
            <ul>
                @foreach($muscle->exercises as $e)
                    <li>{{$e->name}}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
@stop

@section('js')
@stop
