<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($productos as $producto)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class=" space-y-3">
                    <a href=" {{ route('show', $producto->id) }} " class="text-xl font-bold">
                        Nombre del producto: {{ $producto->nombre }}
                    </a>
    
                    <p class=" text-sm text-gray-600 font-normal">
                        Referencia: {{ $producto->referencia }}
                    </p>
    
                    <p class=" text-sm text-gray-600 font-normal">
                        Precio: ${{ $producto->precio }}
                    </p>
    
                    <p class=" text-sm text-gray-600 font-normal">
                        Peso: {{ $producto->peso }} gramos
                    </p>
    
                    <p class=" text-sm text-gray-600 font-normal">
                        Categoria: {{ $producto->categoria }}
                    </p>
    
                    <p class=" text-sm text-gray-600 font-normal">
                        En Stock: {{ $producto->stock }} unidades
                    </p>
    
                    <p class="text-sm text-gray-500">
                        Fecha de Creación: {{ $producto->created_at->format('d/m/Y') }}
                    </p>
                </div>
    
                <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0">
    
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
            </div>
        @empty
            <p class="text-center p-3 text-sm text-gray-600">No hay Productos que mostrar</p>
        @endforelse
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

                    // Eliminar la producto
                    Livewire.emit('eliminarProducto', productoId)

                    Swal.fire(
                    'Se eliminó la producto',
                    'Eliminado Correctamente',
                    'success'
                    )
                }
            }
        )
    });

    
</script>


@endpush