<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Página inicial
     */
    public function index()
    {
        return view('site.index');
    }

    /**
     * Página de cadastro
     */
    public function cadastro()
    {
        return view('site.cadastro');
    }

    /**
     * Dashboard do usuário
     */
    public function dashboard()
    {
        return view('site.dashboard');
    }

    /**
     * Página de login
     */
    public function login()
    {
        return view('site.login');
    }

    /**
     * Página da Lumi AI
     */
    public function lumi()
    {
        return view('site.lumi');
    }

    /**
     * Perfil do usuário
     */
    public function profile()
    {
        return view('site.profile');
    }

    /**
     * RaceMind
     */
    public function racemind()
    {
        return view('site.racemind');
    }

    /**
     * Loja
     */
    public function shop()
    {
        return view('site.shop');
    }

    /**
     * Mundos de conhecimento
     */
    public function worlds()
    {
        return view('site.worlds');
    }

    public function updateProfile(Request $request)
{
    // Exemplo simples sem banco de dados

    session([
        'nome' => $request->nome,
        'nivel' => $request->nivel,
        'xp' => $request->xp,
        'descricao' => $request->descricao
    ]);

    return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
}
}