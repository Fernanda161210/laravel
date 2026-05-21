<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    function index(){ 
        return view('Curso.index');
    }

    function add(Request $dados) { 
        $curso = new \App\Models\CursoModel();
        $curso::create($dados->all());

				//RECUPERANDO TODOS ALUNOS DO BANCO E ENVIANDO PARA A VIEW
				
        $cursos = new \App\Models\CursoModel();

        return view('curso.index', ['success'=>'Cadastrado!', 'cursos'=>$cursos::all()]);
    }
}
