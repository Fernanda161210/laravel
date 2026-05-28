<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    function index()
    {
        $administradores = new \App\Models\AdministradorModel();

        return view('administrador.index', [
            'administradores' => $administradores::all()
        ]);
    }

    function add(Request $dados)
    {
        $administrador = new \App\Models\AdministradorModel();

        $administrador::create($dados->all());

        $administradores = new \App\Models\AdministradorModel();

        return view('administrador.index', [
            'success' => 'Cadastrado!',
            'administradores' => $administradores::all()
        ]);
    }
}