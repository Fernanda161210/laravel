<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Professor extends Controller
{
    function show(){
        $professores = [
            (object) ['nome'=> 'Mariana', 'cpf' => '123.456.789-00'],
            (object) ['nome'=> 'João', 'cpf' => '987.654.321-11'],
            (object) ['nome'=> 'Ana', 'cpf' => '456.789.123-22'],
            (object) ['nome'=> 'Carlos', 'cpf' => '789.123.456-33']
        ];

        return view('professor', compact('professores'));// enviar p/ html 
    }
}
