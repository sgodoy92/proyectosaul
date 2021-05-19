@extends('adminlte::page')

@section('title', 'Proyecto Saul')

@section('content_header')
    <h1>Crear categorias</h1>
@stop

@section('content')
<div class="card">
<div class="card-body">
{!! Form::open(['route' => 'admin.categorias.store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}       
        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese nombre de Categoria']) !!}
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Ingrese nombre de Slug', 'readonly']) !!}
        @error('slug')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
</div>
</div>

@stop


@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script> 

    <script>
$(document).ready( function() {
 $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
    </script>
@endsection