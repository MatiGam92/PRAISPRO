<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PriceCalculator;
use App\Models\Producto;

Route::view('/', 'welcome');


// Redirige la ruta por defecto 'dashboard' a tu calculadora.
Route::redirect('/dashboard', '/calcular-precio')->name('dashboard');

//Agrupa todas las rutas que requieren autenticación.
// El middleware 'auth' se encarga de proteger estas rutas.
Route::middleware(['auth'])->group(function () {
    Route::get('/calcular-precio', PriceCalculator::class)->name('price.calculator');

Route::get('/producto/{producto}', function (Producto $producto) {
    return view('productos.show', compact('producto'));
})->name('productos.show');


});


require __DIR__.'/auth.php';
