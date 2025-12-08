<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Buscador extends Component
{
    public $query = '';
    public $resultados = [];

    // Este método se ejecuta automáticamente cada vez que cambia "query"
    public function updatedQuery()
    {
        if (strlen($this->query) > 1) {
            $this->resultados = Producto::where('name', 'like', '%' . $this->query . '%')
                ->orderBy('name', 'asc')
                ->take(10) // máximo 10 sugerencias
                ->get();
        } else {
            $this->resultados = [];
        }
    }

    // Este se usa cuando el usuario presiona el botón Buscar
    public function buscar()
    {
        if (!empty($this->query)) {
            $this->resultados = Producto::where('name', 'like', '%' . $this->query . '%')
                ->orderBy('name', 'asc')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.buscador')->layout('layouts.app');
    }
}
