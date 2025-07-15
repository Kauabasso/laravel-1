<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(Categoria $categoria)
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Categoria::create($request->only('nome'));

        return redirect()->route('categorias.index');
    }
    public function show(Categoria $categoria)
    {
        $produtos = $categoria->produtos;
        return view('categorias.show', compact('categoria', 'produtos'));
    }


    public function edit($id)
    {
        // Lógica para editar a categoria
        // return view('categorias.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar a categoria
        // return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        // Lógica para excluir a categoria
        // return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }

}
