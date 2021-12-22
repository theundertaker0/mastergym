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
                <div class="col-12">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            @for($i=1; $i <= config('brandVars.trainingDays');$i++)
                                <li role="presentation" class="{{ $i == 1 ? 'active' : '' }}">
                                    <a href="#home{{ $i }}" aria-controls="home" role="tab" data-toggle="tab">Día {{ $i }}</a>
                                </li>
                            @endfor
                        </ul>
                        <div class="tab-content">
                            @for($i=1; $i <= config('brandVars.trainingDays');$i++)
                                <div role="tabpanel" class="tab-pane {{ $i == 1 ? 'active' : '' }}" id="home{{ $i }}" class="active">
                                    {{$i}}
                                </div>
                            @endfor
                        </div>
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
    </script>
@stop
