<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    function index()
    {
        $professores = new \App\Models\ProfessorModel();

        return view('professor.index', [
            'professores' => $professores::all()
        ]);
    }

    function add(Request $dados)
    {
        $professor = new \App\Models\ProfessorModel();

        $professor::create($dados->all());

        $professores = new \App\Models\ProfessorModel();

        return view('professor.index', [
            'success' => 'Cadastrado!',
            'professores' => $professores::all()
        ]);
    }
}