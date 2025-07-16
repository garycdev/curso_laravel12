<!-- Extiende archivos blade con espacio de contenedor -->
@extends('plantilla')

@section('contenido')

    <h3>Lista de usuarios</h3>
    @if (Auth::check())
        <a href="{{ route('logout') }}">Cerrar sesión</a>
    @endif

    <!-- Incluye archivos blade -->
    @include('mensajes')

    @if (!Auth::check())
        No autenticado
        <a href="{{ route('login') }}">Iniciar sesion</a>
    @else
        <form action="{{ route('usuario.crear') }}" method="POST">

            @csrf
            <!-- Equivalente a -->
            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="text" name="username" class="form-control" placeholder="Ingrese su nombre de usuario">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="password" name="contrasena" class="form-control" placeholder="Ingrese su contraseña">
            @error('contrasena')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
        <!-- <?php echo $usuarios; ?> -->
        <!-- {{ $usuarios }} -->
        <!-- <ol>
                @foreach ($usuarios as $user)
    <li>{{ $user->nombre }} [{{ $user->username }}]</li>
    @endforeach
            </ol> -->

        <table class="table table-bordered table-hovered">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Username</th>
                <th></th>
            </tr>
            @foreach ($usuarios as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        <a href="{{ route('usuario.editar', encriptarURL($user->id)) }}">Editar</a>
                        <form action="{{ route('usuario.eliminar', $user->id) }}" method="POST"
                            id="eliminar_{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <!-- Equivalente a -->
                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                        </form>
                        <button
                            onclick="document.getElementById('eliminar_{{ $user->id }}').submit()">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif


@endsection
