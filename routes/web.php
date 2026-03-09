<?php

use App\Http\Controllers\VendedorAuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\GananciaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [VendedorAuthController::class, 'showLoginForm'])->name('vendedor.login');
Route::post('/login', [VendedorAuthController::class, 'login'])->name('vendedor.login.attempt');
Route::post('/logout', [VendedorAuthController::class, 'logout'])->name('vendedor.logout');

Route::middleware('vendedor.auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('dashboard');

    Route::resource('clientes', ClienteController::class)->except(['show', 'destroy']);
    Route::resource('vehiculos', VehiculoController::class)->except(['show', 'destroy']);
    Route::resource('ganancias', GananciaController::class)->except(['show', 'destroy']);
    Route::resource('vendedores', VendedorController::class)->except(['show', 'destroy']);
    Route::resource('usuarios', UsuarioController::class)->except(['show', 'destroy']);
});
