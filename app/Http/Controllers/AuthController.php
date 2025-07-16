<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'remember' => 'nullable',
        ], []);

        // Forma automatica
        // if (! Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        //     session()->flash('error', 'Credenciales incorrectos');
        //     return redirect()->back();
        // }

        // Forma manual
        $user = Usuario::where('username', $request->username)->first();
        if (! $user) {
            return redirect()->back()->with('error', 'El usuario no existe');
        }

        if (! Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }

        Auth::login($user);

        return redirect()->route('usuario.listar');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back()->with('mensaje', 'Sesion cerrada con exito');
    }
}
