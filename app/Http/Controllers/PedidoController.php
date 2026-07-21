<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\ItemPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Lista todos os pedidos (Admin)
     */
    public function index()
    {
        $pedidos = Pedido::with('cliente')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Exibe um pedido
     */
    public function show(string $id)
    {
        $pedido = Pedido::with([
            'cliente',
            'itens.produto'
        ])->findOrFail($id);

        return view('admin.pedidos.show', compact('pedido'));
    }

    /**
     * Finaliza a compra
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $carrinho = Carrinho::with('produto')
                ->where('cliente_id', auth()->id())
                ->get();

            if ($carrinho->isEmpty()) {

                return redirect()
                    ->back()
                    ->with('error', 'Seu carrinho está vazio.');

            }

            $valorTotal = 0;

            foreach ($carrinho as $item) {

                $valor = $item->produto->preco_promocional
                    ?: $item->produto->preco;

                $valorTotal += $valor * $item->quantidade;
            }

            $pedido = Pedido::create([

                'cliente_id' => auth()->id(),

                'numero_pedido' => strtoupper(uniqid('PED')),

                'valor_total' => $valorTotal,

                'status' => 'Pendente',

                'observacoes' => $request->observacoes

            ]);

            foreach ($carrinho as $item) {

                $valor = $item->produto->preco_promocional
                    ?: $item->produto->preco;

                ItemPedido::create([

                    'pedido_id' => $pedido->id,

                    'produto_id' => $item->produto_id,

                    'quantidade' => $item->quantidade,

                    'preco_unitario' => $valor,

                    'subtotal' => $valor * $item->quantidade

                ]);
            }

            Carrinho::where('cliente_id', auth()->id())->delete();

            DB::commit();

            return redirect()
                ->route('cliente.pedidos')
                ->with('success', 'Pedido realizado com sucesso!');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Erro ao finalizar o pedido.');
        }
    }

    /**
     * Atualiza o status do pedido
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'status' => 'required'

        ]);

        $pedido = Pedido::findOrFail($id);

        $pedido->update([

            'status' => $request->status

        ]);

        return redirect()
            ->back()
            ->with('success', 'Status atualizado.');
    }

    /**
     * Remove um pedido
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::findOrFail($id);

        ItemPedido::where('pedido_id', $pedido->id)->delete();

        $pedido->delete();

        return redirect()
            ->back()
            ->with('success', 'Pedido removido.');
    }
}