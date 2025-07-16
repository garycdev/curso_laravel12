<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Middleware\UsuarioAutenticado;
use App\Http\Middleware\UsuarioNoAutenticado;

Route::get('/', function () {
    // Logica del negocio
    return view('hola');
});
Route::get('/hola', function () {
    return view('ejemplo.hola');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('usuario_no_autenticado');

Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::prefix('admin')->middleware('usuario_autenticado')->group(function () {
Route::middleware('usuario_autenticado')->group(function () {
    // Ruta con controlador (forma nativa)
    Route::get('/usuarios', [UsuariosController::class, 'lista'])->name('usuario.listar');
    Route::post('/usuarios', [UsuariosController::class, 'crear'])->name('usuario.crear');
    Route::get('/usuarios/{id}', [UsuariosController::class, 'editar'])->name('usuario.editar');
    Route::put('/usuarios/{id}', [UsuariosController::class, 'actualizar'])->name('usuario.actualizar');
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'eliminar'])->name('usuario.eliminar');
});