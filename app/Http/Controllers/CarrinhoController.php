<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Exibe o carrinho do cliente.
     */
    public function index()
    {
        $itens = Carrinho::with('produto')
            ->where('cliente_id', auth()->id())
            ->get();

        return view('carrinho.index', compact('itens'));
    }

    /**
     * Adiciona um produto ao carrinho.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $item = Carrinho::where('cliente_id', auth()->id())
            ->where('produto_id', $request->produto_id)
            ->first();

        if ($item) {

            $item->increment('quantidade', $request->quantidade);

        } else {

            Carrinho::create([
                'cliente_id' => auth()->id(),
                'produto_id' => $request->produto_id,
                'quantidade' => $request->quantidade,
            ]);

        }

        return redirect()
            ->back()
            ->with('success', 'Produto adicionado ao carrinho!');
    }

    /**
     * Atualiza a quantidade.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1',
        ]);

        $item = Carrinho::findOrFail($id);

        $item->update([
            'quantidade' => $request->quantidade,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Carrinho atualizado!');
    }

    /**
     * Remove um item.
     */
    public function destroy(string $id)
    {
        $item = Carrinho::findOrFail($id);

        $item->delete();

        return redirect()
            ->back()
            ->with('success', 'Produto removido do carrinho!');
    }

    /**
     * Limpa todo o carrinho.
     */
    public function limpar()
    {
        Carrinho::where('cliente_id', auth()->id())->delete();

        return redirect()
            ->back()
            ->with('success', 'Carrinho esvaziado!');
    }
}