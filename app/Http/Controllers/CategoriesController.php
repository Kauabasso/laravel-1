<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Category::create($request->only('nome'));

        return redirect()->route('categories.index');
    }
    public function show(Category $category)
    {
        $produtos = $category->produtos;
        return view('categories.show', compact('category', 'produtos'));
    }


    public function edit($id)
    {
        // Lógica para editar a categorie
        // return view('categories.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar a categorie
        // return redirect()->route('categories.index')->with('success', 'Categorie atualizada com sucesso!');
    }

    public function destroy($id)
    {
        // Lógica para excluir a categorie
        // return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }

}
