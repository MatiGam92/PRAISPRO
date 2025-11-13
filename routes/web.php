<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\PriceCalculator;
use App\Livewire\Buscador;
use App\Models\Producto;

// --------------------
// Rutas públicas
// --------------------
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : view('welcome');
});

Route::get('/welcome', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : view('welcome');
});

Route::view('/ia-team', 'ia-team');

// --------------------
// Rutas protegidas (requieren autenticación)
// --------------------
Route::middleware('auth')->group(function () {

    // Dashboard central
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Calculadora (Livewire)
    Route::get('/calcular-precio', PriceCalculator::class)->name('price.calculator');

    // Buscador (Livewire)
    Route::get('/buscador', Buscador::class)->name('buscador');
});

// --------------------
// Vista pública de producto individual
// --------------------
Route::get('/producto/{producto}', function (Producto $producto) {
    return view('productos.show', compact('producto'));
})->name('productos.show');

require __DIR__.'/auth.php';
