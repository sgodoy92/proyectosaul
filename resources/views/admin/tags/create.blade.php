@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <p>Etiquetas.</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}
            <!-- Plantilla carpeta partials/form.blade.php-->
                @include('admin.tags.partials.form')
            {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
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