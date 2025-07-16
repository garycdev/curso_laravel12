@extends('plantilla')


@section('contenido')

<h3>Editar</h3>

@php
    $id = encriptarURL($usuario->id);
    $idDesencriptado = desencriptarURL($id);
@endphp

{{ $id }}
<br>
{{ $idDesencriptado }}
<br>
<form action="{{ route('usuario.actualizar', $usuario->id) }}" method="POST">
    @csrf
    <!-- Equivalente a -->
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
    @method('PUT')
    <!-- Equivalente a -->
    <!-- <input type="hidden" name="_method" value="PUT"> -->

    <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" value="{{ $usuario->nombre }}">
    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <input type="text" name="username" class="form-control" placeholder="Ingrese su nombre de usuario" value="{{ $usuario->username }}">
    @error('username')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    
    <input type="password" name="contrasena" class="form-control" placeholder="Ingrese su contraseña">
    @error('contrasena')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <button type="submit" class="btn btn-primary">Editar</button>
</form>
@endsection