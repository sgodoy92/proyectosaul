@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar rol</h1>
@stop

@section('content')

    <!-- Mensaje de que se actualizo correctamente-->
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}}</p>

                <h2 class="h5">Listado de roles</h2>
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put'])!!}
                    <!-- Recorre listado de roles-->
                    @foreach($roles as $role)
                        <div>
                            <label>
                                <!-- Form checkbox recogemos todos los roles, null para que
                                ningun checkbox este marcado margin-right 1 roles [] para seleccionar más
                                de un Array -->
                                {!! Form::checkbox('roles[]', $role->id, null,['class' => 'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
        
                {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop