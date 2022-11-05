<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class EditarProducto extends Component
{
    public $nombre;
    public $referencia;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;

    protected $rules = [
        'nombre' => 'required|string',
        'referencia' => 'required|string',
        'precio' => 'required|integer',
        'peso' => 'required|integer',
        'categoria' => 'required|string',
        'stock' => 'required|integer',
    ];

    public function mount(Producto $producto)
    {
        $this->producto_id      =       $producto->id;
        $this->nombre           =       $producto->nombre;
        $this->referencia       =       $producto->referencia;
        $this->precio           =       $producto->precio;
        $this->peso             =       $producto->peso;
        $this->categoria        =       $producto->categoria;
        $this->stock            =       $producto->stock;
    }

    public function editarProducto()
    {
        $datos = $this->validate();

        $producto = Producto::find($this->producto_id);

        $producto->nombre           =       $datos['nombre'];
        $producto->referencia       =       $datos['referencia'];
        $producto->precio           =       $datos['precio'];
        $producto->peso             =       $datos['peso'];
        $producto->categoria        =       $datos['categoria'];
        $producto->stock            =       $datos['stock'];

        $producto->save();

        session()->flash('mensaje', 'El producto ' . $producto->nombre . ' se actualizó correctamente');

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.editar-producto');
    }
}
