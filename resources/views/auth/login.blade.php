@extends('plantilla')

@section('contenido')
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        
        @include('mensajes')

        <div class="d-flex flex-column justify-content-center">
            <div class="form-group">
                <label for="username" class="input-label">Nombre de usuario</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="input-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember">Recordarme</label>
            </div>
            <button type="submit" class="btn btn-success">Iniciar sesión</button>
        </div>
    </form>
@endsection
