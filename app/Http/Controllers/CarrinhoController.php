<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index() {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
   }

   public function store(Produto $produto)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]['quantidade'] += 1;
        } else {
            $carrinho[$produto->id] = [
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'quantidade' => 1,
                'imagem' => $produto->imagem,
                'categoria_id' => 'required|exists:categorias,id',

            ];
        }

        session()->put('carrinho', $carrinho);

        return redirect()->route('carrinho.index')->with('success', 'Produto adicionado ao carrinho!');
    }
    
    public function remove(Produto $produto) {
        $carrinho = session()->get('carrinho', []);

            unset($carrinho[$produto]);
            $carrinho = session()('carrinho', $carrinho);
            return redirect()->route('carrinho.index')->with('success', 'Produto removido do carrinho!');
    }
}
