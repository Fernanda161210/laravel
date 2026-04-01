<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aluno extends Controller
{
    function show(){
        $alunos = [
            (object) ['nome'=> 'Mariana', 'telefone' => '987654321', 'email'=>'m@gmail.com'],
            (object) ['nome'=> 'Juliana', 'telefone' => '912345678', 'email'=>'J@gmail.com'],
            (object) ['nome'=> 'Maria', 'telefone' => '998877665', 'email'=>'MR@gmail.com'],
            (object) ['nome'=> 'Carlos', 'telefone' => '934567890', 'email'=>'carlos@gmail.com'],
            (object) ['nome'=> 'Ana', 'telefone' => '976543210', 'email'=>'ana@gmail.com'],
            (object) ['nome'=> 'João', 'telefone' => '945612378', 'email'=>'joao@gmail.com']
        ];

        return view('aluno', compact('alunos'));// enviar p/ html 
    }

    function add(){
        
     //adicone os dados  ao array aluno e envie para view
     
    }
}
