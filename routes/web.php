<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

Route::get('/', function () {
    // Logica del negocio
    return view('hola');
});
Route::get('/hola', function () {
    return view('ejemplo.hola');
});

// Ruta con controlador (forma nativa)
Route::get('/usuarios', [UsuariosController::class, 'lista'])->name('usuario.listar');
Route::post('/usuarios', [UsuariosController::class, 'crear'])->name('usuario.crear');
Route::get('/usuarios/{id}', [UsuariosController::class, 'editar'])->name('usuario.editar');
Route::put('/usuarios/{id}', [UsuariosController::class, 'actualizar'])->name('usuario.actualizar');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'eliminar'])->name('usuario.eliminar');