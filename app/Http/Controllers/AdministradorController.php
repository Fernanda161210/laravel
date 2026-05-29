<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    function index()
    {
        $administrador = new \App\Models\AdministradorModel();

        return view('administrador.index', [
            'administradores' => $administrador::all()
        ]);
    }

    function add(Request $dados)
    {
        $administrador = new \App\Models\AdministradorModel();

        $administrador::create($dados->all());

        return view('administrador.index', [
            'success' => 'Cadastrado!',
            'administradores' => $administrador::all()
        ]);
    }

    function remove(string $id)
    {
        $administrador = new \App\Models\AdministradorModel();

        $administrador::destroy($id);

        return view('administrador.index', [
            'success' => 'Removido!',
            'administradores' => $administrador::all()
        ]);
    }

    function atualizar(string $id)
    {
        $administrador = new \App\Models\AdministradorModel();

        $administrador = $administrador::find($id);

        return view('administrador.atualizar', [
            'administrador' => $administrador
        ]);
    }

    function save(Request $dados)
    {
        $administrador = new \App\Models\AdministradorModel();

        $administrador = $administrador::find($dados->id);

        $administrador->update($dados->all());

        return view('administrador.atualizar', [
            'success' => 'Atualizado!',
            'administrador' => $administrador
        ]);
    }
}