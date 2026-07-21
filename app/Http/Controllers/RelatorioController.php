<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    /**
     * Exibe a tela de relatórios.
     */
    public function index(Request $request)
    {
        $dataInicio = $request->data_inicio;
        $dataFim = $request->data_fim;

        // Consulta base
        $pedidos = Pedido::with('cliente');

        if ($dataInicio && $dataFim) {
            $pedidos->whereBetween('created_at', [
                $dataInicio . ' 00:00:00',
                $dataFim . ' 23:59:59'
            ]);
        }

        $pedidos = $pedidos->orderBy('created_at', 'desc')->get();

        // Indicadores
        $totalPedidos = $pedidos->count();

        $faturamento = $pedidos->sum('valor_total');

        $clientes = User::where('tipo', 'cliente')->count();

        $produtos = Produto::count();

        // Produtos mais vendidos
        $maisVendidos = DB::table('item_pedidos')
            ->join('produtos', 'item_pedidos.produto_id', '=', 'produtos.id')
            ->select(
                'produtos.nome',
                DB::raw('SUM(item_pedidos.quantidade) as vendidos')
            )
            ->groupBy('produtos.nome')
            ->orderByDesc('vendidos')
            ->limit(10)
            ->get();

        return view('admin.relatorios.index', compact(
            'pedidos',
            'totalPedidos',
            'faturamento',
            'clientes',
            'produtos',
            'maisVendidos',
            'dataInicio',
            'dataFim'
        ));
    }
}