<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\PriceCalculator;
use App\Livewire\Buscador;
use App\Http\Controllers\HistorialController;
use App\Models\Producto;

// --------------------
// Rutas públicas
// --------------------
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('historial.index')
        : view('welcome');
});

Route::get('/welcome', function () {
    return Auth::check()
        ? redirect()->route('historial.index')
        : view('welcome');
});

Route::view('/ia-team', 'ia-team');

// --------------------
// Rutas protegidas
// --------------------
Route::middleware('auth')->group(function () {


    Route::get('/conversor', function () {
    return view('converter');
    })->name('converter');
//Route::get('/calcular-precio', PriceCalculator::class)
    //->name('calculator.create');

    // Calculadora (crear o editar)
    Route::get('/calcular-precio/{producto?}', PriceCalculator::class)
        ->name('calculator');

    // Buscador
    //Route::get('/buscador', Buscador::class)->name('buscador');

    // Historial index
    Route::get('/historial', function () {
        $productos = Producto::where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('historial.index', compact('productos'));
    })->name('historial.index');

    Route::get('/historial/{producto}', function (Producto $producto) {

    abort_unless($producto->user_id === auth()->id(), 403);

    return view('historial.show', compact('producto'));

})->name('historial.show');


    // Editar producto → redirige a Livewire
    Route::get('/historial/{id}/editar', [HistorialController::class, 'edit'])
        ->name('historial.edit');

    // Eliminar producto
    Route::delete('/historial/{id}', [HistorialController::class, 'destroy'])
        ->name('historial.destroy');
});

require __DIR__.'/auth.php';
