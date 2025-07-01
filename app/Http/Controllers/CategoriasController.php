<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(Categoria $categoria)
    {
        $produtos = $categoria->produtos()->get();
        return view('categorias.index', compact('categoria', 'produtos'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        // Lógica para armazenar a categoria
        // Exemplo: Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        // Lógica para editar a categoria
        return view('categorias.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar a categoria
        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        // Lógica para excluir a categoria
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }

}
