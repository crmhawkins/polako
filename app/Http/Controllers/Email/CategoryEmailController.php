<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Email\CategoryEmail;
use Illuminate\Http\Request;

class CategoryEmailController extends Controller
{
    public function index()
    {
        $categories = CategoryEmail::all();
        return view('categoryEmail.index', compact('categories'));
    }

    public function create()
    {
        return view('categoryEmail.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'other' => 'nullable|string',
        ]);

        CategoryEmail::create($request->all());

        return redirect()->route('admin.categoriaEmail.index')->with('status', 'Categoría creada exitosamente.');
    }

    public function edit($id)
    {
        $category = CategoryEmail::findOrFail($id);
        return view('categoryEmail.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'other' => 'nullable|string',
        ]);

        $category = CategoryEmail::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categoriaEmail.index')->with('status', 'Categoría actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $category = CategoryEmail::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categoriaEmail.index')->with('status', 'Categoría eliminada exitosamente.');
    }
}

