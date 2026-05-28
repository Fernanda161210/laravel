<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    function index()
    {
        $componentes = new \App\Models\ComponenteModel();

        return view('componente.index', [
            'componentes' => $componentes::all()
        ]);
    }

    function add(Request $dados)
    {
        $componente = new \App\Models\ComponenteModel();

        $componente::create($dados->all());

        $componentes = new \App\Models\ComponenteModel();

        return view('componente.index', [
            'success' => 'Cadastrado!',
            'componentes' => $componentes::all()
        ]);
    }
}