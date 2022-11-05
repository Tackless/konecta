<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class CrearProducto extends Component
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

    public function crearProducto()
    {
        $datos = $this->validate();

        Producto::create([
            'nombre'        => $datos['nombre'],
            'referencia'    => $datos['referencia'],
            'precio'        => $datos['precio'],
            'peso'          => $datos['peso'],
            'categoria'     => $datos['categoria'],
            'stock'         => $datos['stock']
        ]);

        session()->flash('mensaje', 'El producto se agregó correctamente');

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.crear-producto');
    }
}
