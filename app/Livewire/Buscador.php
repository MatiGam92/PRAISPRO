<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Buscador extends Component
{
    public $query = '';
    public $resultados = [];
    public $buscando = false;

    // Sugerencias en tiempo real
    public function updatedQuery()
    {
        if (strlen($this->query) > 1) {
            $this->resultados = Producto::where('user_id', auth()->id())
                ->where('name', 'like', '%' . $this->query . '%')
                ->orderBy('name')
                ->take(6)
                ->get();

            $this->buscando = true;
        } else {
            $this->resetBusqueda();
        }
    }

    // Botón Buscar
    public function buscar()
    {
        if (!empty($this->query)) {
            $this->resultados = Producto::where('user_id', auth()->id())
                ->where('name', 'like', '%' . $this->query . '%')
                ->orderBy('created_at', 'desc')
                ->get();

            $this->buscando = true;
        }
    }

    public function resetBusqueda()
    {
        $this->resultados = [];
        $this->buscando = false;
    }

    public function render()
    {
        return view('livewire.buscador');
    }
}
