<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Registro;

class MostrarProducto extends Component
{
    public $producto;

    protected $listeners = [
        'eliminarProducto',
        'agregarStock',
        'quitarStock'
    ];

    public function eliminarProducto(Producto $producto)
    {
        $producto->delete();

        session()->flash('mensaje', 'El producto se eliminó correctamente');

        return redirect()->route('home');
    }

    public function quitarStock(Producto $producto, $cantidad)
    {
        if ($producto->stock < $cantidad) {
            session()->flash('mensaje', 'No se realizó la venta por falta de stock');

            return redirect()->route('home');
        }

        $producto->stock -= $cantidad;

        $producto->save();

        Registro::create([
            'producto_id'   =>  $producto->id,
            'cantidad'      =>  $cantidad
        ]);

        session()->flash('mensaje', 'Se registró la venta correctamente');

        return redirect()->route('home');

    }

    public function render(Producto $producto)
    {
        $registros = Registro::all()->sortByDesc("created_at");

        return view('livewire.mostrar-producto', [
            'registros' => $registros
        ]);
    }
}
