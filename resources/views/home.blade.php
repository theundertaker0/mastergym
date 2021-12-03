@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{config('brandVars.cName')}}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row mt-4">
        <div class="col-12 text-center">
            <img src="{{asset(config('brandVars.bigLogo'))}}" alt="Logo" class="rounded-circle mb-2" style="max-width: 300px;">
            <h4>Bienvenido al Sistema de Control de Gimnasios.</h4>
            <p>Utiliza el menú lateral izquierdo para navegar por los diferentes módulos</p>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
