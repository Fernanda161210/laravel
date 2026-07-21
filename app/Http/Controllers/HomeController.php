<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Promocao;

class HomeController extends Controller
{
    /**
     * Página inicial do site.
     */
    public function index()
    {
        // Banners ativos
        $banners = Banner::where('ativo', true)
            ->orderBy('ordem')
            ->get();

        // Categorias
        $categorias = Categoria::orderBy('nome')
            ->get();

        // Produtos em destaque
        $destaques = Produto::where('ativo', true)
            ->where('destaque', true)
            ->take(8)
            ->get();

        // Produtos em promoção
        $promocoes = Produto::where('ativo', true)
            ->where('promocao', true)
            ->take(8)
            ->get();

        // Produtos mais recentes
        $novidades = Produto::where('ativo', true)
            ->latest()
            ->take(8)
            ->get();

        // Promoções ativas
        $campanhas = Promocao::where('ativo', true)
            ->orderBy('data_inicio')
            ->get();

        return view('home', compact(
            'banners',
            'categorias',
            'destaques',
            'promocoes',
            'novidades',
            'campanhas'
        ));
    }
}