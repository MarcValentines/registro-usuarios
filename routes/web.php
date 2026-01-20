<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

//rutas públicas
Route::get('/login', function () {
    return view('login');
}); //mostrar formulario de login
Route::post('/login', [AuthController::class, 'login']); //enviar petición de inicio de sesión

Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);

//rutas protegidas (usuario autenticado)

Route::middleware('auth')->group(function() {
    Route::get('/profile', function() {
        return view('profile');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});

//Rutas protegidas admin

Route::middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::get('/users', [UserController::class, 'index']);
});