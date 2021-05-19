@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar roles</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
    <!--$role carga el contenido del role para editarlo en los campos-->
    {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method'=>'put']) !!}
        @include('admin.roles.partials.form')
    {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

</div>
</div>
@stop