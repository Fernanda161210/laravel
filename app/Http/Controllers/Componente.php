<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Componente extends Controller
{
    function show(){
        $componentes = [
            (object) ['nome'=> 'PWII', 'horario' => '12:00'],
            (object) ['nome'=> 'Matemática', 'horario' => '08:00'],
            (object) ['nome'=> 'Física', 'horario' => '10:00'],
            (object) ['nome'=> 'Química', 'horario' => '14:00'],
            (object) ['nome'=> 'História', 'horario' => '16:00']
        ];

        return view('componente', compact('componentes'));// enviar p/ html 
    }
}
