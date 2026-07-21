<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Exibe o dashboard administrativo.
     */
    public function index()
    {
        // Cards
        $totalProdutos = Produto::count();

        $totalClientes = User::where('tipo', 'cliente')->count();

        $totalPedidos = Pedido::count();

        $faturamento = Pedido::sum('valor_total');

        // Últimos pedidos
        $ultimosPedidos = Pedido::with('cliente')
            ->latest()
            ->take(5)
            ->get();

        // Produtos com menor estoque
        $baixoEstoque = Produto::where('estoque', '<=', 10)
            ->orderBy('estoque')
            ->take(5)
            ->get();

        // Produtos mais vendidos
        $maisVendidos = DB::table('item_pedidos')
            ->join('produtos', 'item_pedidos.produto_id', '=', 'produtos.id')
            ->select(
                'produtos.nome',
                DB::raw('SUM(item_pedidos.quantidade) as total')
            )
            ->groupBy('produtos.nome')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProdutos',
            'totalClientes',
            'totalPedidos',
            'faturamento',
            'ultimosPedidos',
            'baixoEstoque',
            'maisVendidos'
        ));
    }
}