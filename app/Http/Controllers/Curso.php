<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Curso extends Controller
{
    function show(){
        $cursos = [
            (object) ['nome' => 'Administração', 'periodo' => '12:00'],
            (object) ['nome' => 'Engenharia', 'periodo' => '13:00'],
            (object) ['nome' => 'Direito', 'periodo' => '13:00'],
            (object) ['nome' => 'Medicina', 'periodo' => '11:00']
        ];

        return view('curso', compact('cursos'));// enviar p/ html 
    }
}
