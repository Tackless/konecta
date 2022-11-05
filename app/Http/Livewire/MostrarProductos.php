<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class MostrarProductos extends Component
{
    protected $listeners = ['eliminarProducto'];

    public function eliminarProducto(Producto $producto)
    {
        $producto->delete();
    }

    public function render()
    {
        $productos = Producto::all();
        return view('livewire.mostrar-productos', [
            'productos' => $productos
        ]);
    }
}
