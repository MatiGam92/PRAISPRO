<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    // Mostrar lista
    public function index()
    {
        $productos = Producto::latest()->get();
        return view('historial.index', compact('productos'));
    }

    // Mostrar detalle
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('historial.show', compact('producto'));
    }

    // 👉 Editar: redirige al formulario de la calculadora con los datos cargados
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return redirect()->route('calculator', $producto->id);
        // Alternativa: redirigir a un componente Livewire: 
        // return redirect()->route('calculadora', ['edit_id' => $id]);
    }

    // 👉 Eliminar
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Borrar foto si existe
        if ($producto->photo && \Storage::exists('public/'.$producto->photo)) {
            \Storage::delete('public/'.$producto->photo);
        }

        $producto->delete();

        return redirect()
            ->route('historial.index')
            ->with('success', 'El cálculo fue eliminado correctamente.');
    }
}

