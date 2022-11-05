<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="editarProducto"> {{-- wire:submit.prevent="crearVacante" para comunicar con el controlador --}}
    <div class="">
        <label class="block text-sm text-gray-500 font-bold uppercase mb-2" for="nombre">
            Nombre del Producto:  
        </label>

        <input id="nombre" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" wire:model="nombre" :value="old('nombre')" placeholder="Nombre del Producto">

        @error('nombre')
            <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
                El campo es requerido
            </div>
            
        @enderror
    </div>
    
    <div class="">
        <label class="block text-sm text-gray-500 font-bold uppercase mb-2" for="referencia">
            Referencia:  
        </label>

        <input id="referencia" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" wire:model="referencia" :value="old('referencia')" placeholder="Referencia">

        @error('referencia')
            <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
                El campo es requerido
            </div>
        @enderror
    </div>

    <div class="">
        <label class="block text-sm text-gray-500 font-bold uppercase mb-2" for="precio">
            Precio:  
        </label>

        <input id="precio" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" min="0" wire:model="precio" :value="old('precio')" placeholder="Precio">

        @error('precio')
            <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
                El campo es requerido
            </div>
        @enderror
    </div>

    <div class="">
        <label class="block text-sm text-gray-500 font-bold uppercase mb-2" for="peso">
            Peso en gramos:  
        </label>

        <input id="peso" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" min="0" wire:model="peso" :value="old('peso')" placeholder="Peso en gramos">

        @error('peso')
            <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
                El campo es requerido
            </div>
        @enderror
    </div>

    <div class="">
        <label class="block text-sm text-gray-500 font-bold uppercase mb-2" for="categoria">
            Categoria:  
        </label>

        <input id="categoria" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" wire:model="categoria" :value="old('categoria')" placeholder="Categoria">

        @error('categoria')
            <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
                El campo es requerido
            </div>
        @enderror
    </div>

    <div class="">
        <label class="block text-sm text-gray-500 font-bold uppercase mb-2" for="stock">
            Stock:  
        </label>

        <input id="stock" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" min="0" wire:model="stock" :value="old('stock')" placeholder="Stock">

        @error('stock')
            <div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
                El campo es requerido
            </div>
        @enderror
    </div>

    <button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        Guardar Cambios
    </button>
</form>