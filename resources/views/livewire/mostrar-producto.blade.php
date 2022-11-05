<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            Nombre: {{ $producto->nombre }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Referencia: 
                <span class=" normal-case font-normal">{{ $producto->referencia }}</span>
            </p>

            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Precio: 
                <span class=" normal-case font-normal">${{ $producto->precio }} MXN</span>
            </p>

            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Peso: 
                <span class=" normal-case font-normal">{{ $producto->peso }} gramos</span>
            </p>

            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Categoría: 
                <span class=" normal-case font-normal">{{ $producto->categoria }}</span>
            </p>

            <p class=" font-bold text-sm uppercase text-gray-800 my-3">En Stock: 
                <span class=" normal-case font-normal">{{ $producto->stock }} unidades</span>
            </p>

            <p class=" font-bold text-sm uppercase text-gray-800 my-3">Fecha de creación: 
                <span class=" normal-case font-normal">{{ $producto->created_at->toFormattedDateString() }}</span>
            </p>
            
        </div>

        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">

            <button 
                wire:click="$emit('mostrarAlertaRestStock', {{ $producto->id }})" {{-- Para escuchar por un evento --}}
                class="bg-green-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
            >
                Registrar Venta
            </button>
    
            <a href="{{ route('edit', $producto->id) }}" class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Editar
            </a>

            <button 
                wire:click="$emit('mostrarAlerta', {{ $producto->id }})" {{-- Para escuchar por un evento --}}
                class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
            >
                Eliminar
            </button>

        </div>

        <h3 class="font-bold text-3xl text-gray-800 my-5">
            Registros de Venta
        </h3>

        <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0">
            
            @forelse ($registros as $registro)
            @if ($registro->producto_id == $producto->id)
                <div class="p-6 bg-green-600 border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="md:flex md:flex-row space-x-5 ">
                            <p class=" text-sm text-black font-normal">
                                Cantidad: {{ $registro->cantidad }}
                            </p>
        
                            <p class="text-sm text-black">
                                Fecha de Registro: {{ $registro->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center p-3 text-sm text-gray-600">No hay Registros que mostrar</p>
            @endforelse
        </div>
        
    </div>
</div>


@push('scripts')
    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    Livewire.on('mostrarAlerta', productoId => {
        Swal.fire({
            title: '¿Eliminar producto?',
            text: "Un producto eliminado no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, ¡Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Eliminar producto
                    Livewire.emit('eliminarProducto', productoId)

                    Swal.fire(
                    'Se eliminó el producto',
                    'Eliminado Correctamente',
                    'success'
                    )
                }
            }
        )
    });

    Livewire.on('mostrarAlertaRestStock', productoId => {
        Swal.fire({
            title: '¿Cuantas unidades se vendieron?',
            input: 'text',
            inputLabel: 'Unidades',
            showCancelButton: true,
            inputValidator: (value) => {
                if (isNaN(value) || value <= 0) {
                    return 'Escribe un número mayor de 0'
                } else {
                    Livewire.emit('quitarStock', productoId, value)
                    // Swal.fire(`Se han vendido ${value} unidad(es) correctamente`)
                }
                
            }
        });
    });

    
</script>


@endpush