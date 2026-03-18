<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Muestra el listado de categorías.
     */
    public function index()
    {
        $categories = Category::all();
        // Nota: Usaremos la carpeta 'categories' para las vistas
        return view('categories.index', compact('categories'));
    }

    /**
     * Muestra el formulario para crear una nueva categoría (new).
     */
    public function create()
    {
        return view('categories.new');
    }

    /**
     * Guarda la categoría en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
            'description' => 'required|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Categoría creada con éxito.');
    }

    /**
     * Muestra el formulario para editar.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Actualiza la categoría.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:80',
            'description' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Elimina la categoría.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Categoría eliminada.');
    }
}