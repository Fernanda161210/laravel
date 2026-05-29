<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function index()
    {
        $professor = new \App\Models\ProfessorModel();

        return view('professor.index', [
            'professores' => $professor::all()
        ]);
    }

    function add(Request $dados)
    {
        $professor = new \App\Models\ProfessorModel();

        $professor::create($dados->all());

        return view('professor.index', [
            'success' => 'Cadastrado!',
            'professores' => $professor::all()
        ]);
    }

    function remove(string $id)
    {
        $professor = new \App\Models\ProfessorModel();

        $professor::destroy($id);

        return view('professor.index', [
            'success' => 'Removido!',
            'professores' => $professor::all()
        ]);
    }

    function atualizar(string $id)
    {
        $professor = new \App\Models\ProfessorModel();

        $professor = $professor::find($id);

        return view('professor.atualizar', [
            'professor' => $professor
        ]);
    }

    function save(Request $dados)
    {
        $professor = new \App\Models\ProfessorModel();

        $professor = $professor::find($dados->id);

        $professor->update($dados->all());

        return view('professor.atualizar', [
            'success' => 'Atualizado!',
            'professor' => $professor
        ]);
    }
}