<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// La ruta principal
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// La ruta que recibe los datos del formulario (POST)
Route::post('/productos', [ProductController::class, 'store'])->name('products.store');

// La ruta para borrar (DELETE)
Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Ruta para MOSTRAR el formulario de edición (GET)
Route::get('/productos/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Ruta para PROCESAR la actualización (PUT o PATCH)
Route::put('/productos/{product}', [ProductController::class, 'update'])->name('products.update');
