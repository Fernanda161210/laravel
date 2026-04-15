<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aluno extends Controller
{
    function index(){ 
        return view('aluno.index');
    }
   
    function adicionar(Request $dados){ 
        dd($dados->all());
    }

    function remover(Resquest $dados){ }

    function atualizar(Request $dados){ }

    function consultar(Request $dados){ }

    
}


