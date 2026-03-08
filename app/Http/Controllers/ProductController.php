<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Empezamos la consulta sin ejecutarla aún
        $query = Product::query();

        // 2. Si el usuario ha escrito algo en el input 'buscar'
        if ($request->filled('buscar')) {
            $termino = $request->buscar;
            // El % sirve para buscar "que contenga" esa palabra
            $query->where('name', 'LIKE', '%' . $termino . '%');
        }

        // 3. Ejecutamos la consulta y enviamos a la vista
        $products = $query->get();

        return view('products', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
// 1. Guardamos los datos que vienen del formulario
        Product::create($request->all());
        // 2. Redirigimos a la página principal (index) para ver el nuevo producto
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Pasamos el producto a una vista llamada 'edit'
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Actualizamos con los nuevos datos del formulario
        $product->update($request->all());

        // Volvemos a la lista principal con un mensaje
        return redirect()->route('products.index')->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect()->back();
    }
}
