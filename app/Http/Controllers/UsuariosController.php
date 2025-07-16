<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    function lista() {
        $usuarios = Usuario::all();
        // $usuarios = Usuario::where('estado', '1')->get();

        // return view('usuarios.lista', ['usuarios' => $usuarios, '' => '', ...]);
        return view('usuarios.lista', compact('usuarios'));
    }

    // Ignoramos create (redirigir a un formulario)

    function crear(Request $request) {
        // dd($request);

        $validated = $request->validate([
            // Establecer validaciones

            'nombre' => 'nullable|between:3,10|string',
            'username' => 'required|string|unique:usuarios,username',
            'contrasena' => 'required|min:5',
        ], [
            // Mensajes de esas validaciones (opcional)

            'nombre.between' => 'El nombre debe contener entre :min a :max letras.',
            'nombre.alpha' => 'El nombre solo debe contener letras.',
            'contrasena.required' => 'La contraseña es requerida.'
        ]);

        // Cuando campo y columna se llaman lo mismo
        // Usuario::create($request);

        // Cuando campo y columna no son iguales
        Usuario::create([
            'nombre' => $request->nombre,
            'username' => $request->username,
            'password' => Hash::make($request->contrasena)
        ]);

        // return redirect()->route('usuario.listar');


        session()->flash('mensaje', 'El usuarios a sido creado satisfactoriamente');
        // return redirect()->back()->with('mensaje', 'El usuarios a sido creado satisfactoriamente');
        return redirect()->back();
    }

    // Ignoramos show (sirve para mostrar un solo registro)

    public function editar(string $id) {
        // $usuario = Usuario::where('id', $id)->first();
        $idDesencriptado = desencriptarURL($id);
        $usuario = Usuario::find($idDesencriptado);

        return view('usuarios.editar', compact('usuario'));
    }

    public function actualizar(Request $request, string $id) {

        if (!Auth::check()) {
            return redirect()->back();
        }
        // $request->validate();

        $usuario = Usuario::find($id);
        // Usuario::update([
        //     'nombre' ....
        // ]);
        $usuario->nombre = $request->nombre;
        $usuario->username = $request->username;
        $usuario->password = Hash::make($request->contrasena);
        $usuario->save();

        session()->flash('mensaje', 'usuario editado');
        return redirect()->route('usuario.listar');
    }

    public function eliminar(string $id) {
        $usuario = Usuario::find($id);
        $usuario->delete();

        session()->flash('mensaje', 'usuario eliminar');
        return redirect()->back();
    }
}
