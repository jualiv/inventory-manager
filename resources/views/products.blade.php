<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventory Manager by jualiv</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
   <div class="w-full flex justify-center py-4">
        <form action="{{ route('products.index') }}" method="GET" class="flex items-center gap-2">
            <input
                type="text"
                name="buscar"
                placeholder="Buscar por nombre..."
                value="{{ request('buscar') }}"
                class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Buscar
            </button>

            @if(request('buscar'))
                <a href="{{ route('products.index') }}" class="text-sm text-red-600 underline">Limpiar filtro</a>
            @endif
        </form>
    </div>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">

        <h1 class="text-3xl font-bold mb-6 text-blue-600 border-b pb-4">Gestión de Productos</h1>

        <section class="mb-10">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Añadir nuevo producto</h2>
            <form action="{{ route('products.store') }}" method="POST" class="grid grid-cols-1 gap-4">
                @csrf
                <input type="text" name="name" placeholder="Nombre del producto" class="border p-2 rounded w-full" required>

                <textarea name="description" placeholder="Descripción (opcional)" class="border p-2 rounded w-full"></textarea>

                <div class="flex gap-4">
                    <input type="number" step="0.01" name="price" placeholder="Precio (ej: 10.50)" class="border p-2 rounded w-full" required>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition">
                        Guardar
                    </button>
                </div>
            </form>
        </section>

        <hr class="mb-8">

        <section>
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Productos en inventario</h2>
            <ul class="space-y-4">
                @forelse ($products as $product)
                <li class="flex justify-between items-center p-4 bg-gray-50 rounded-lg border border-gray-200 hover:shadow-sm transition">
                    <div>
                        <h3 class="font-bold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $product->description }}</p>
                        <span class="text-green-600 font-semibold">{{ $product->price }}€</span>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-100 text-yellow-600 hover:bg-yellow-600 hover:text-white p-2 rounded-full transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-600 hover:text-white p-2 rounded-full transition" onclick="return confirm('¿Seguro que quieres borrarlo?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </li>
                @empty
                    <div class="text-center py-10 text-gray-400 font-light">
                        No hay productos registrados aún.
                    </div>
                @endforelse
            </ul>
        </section>
            <!-- boton para ir a la pagina de prueba -->
        <div class="mt-4">
            <a href="{{ route('pagina_prueba') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Ir a mi web de prueba
            </a>
        </div>

    </div>
</body>
</html>
