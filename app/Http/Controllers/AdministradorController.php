<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make(
            $dados->all(),
            [
                'nome' => 'required|min:3|max:255',
                'email' => 'required|email|max:255',
                'telefone' => 'required',
                'cpf' => 'required',
                'usuario' => 'required|min:3|max:255',
                'senha' => 'required|min:3|max:255',
                'status' => 'required|min:3|max:255',
            ],
            [
                'nome.required' => 'O campo nome é obrigatório.',
                'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',

                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'Informe um email válido.',
                'email.max' => 'O campo email deve conter no máximo 255 caracteres.',

                'telefone.required' => 'O campo telefone é obrigatório.',

                'cpf.required' => 'O campo CPF é obrigatório.',

                'usuario.required' => 'O campo usuário é obrigatório.',
                'usuario.min' => 'O campo usuário deve conter no mínimo 3 caracteres.',
                'usuario.max' => 'O campo usuário deve conter no máximo 255 caracteres.',

                'senha.required' => 'O campo senha é obrigatório.',
                'senha.min' => 'O campo senha deve conter no mínimo 3 caracteres.',
                'senha.max' => 'O campo senha deve conter no máximo 255 caracteres.',

                'status.required' => 'O campo status é obrigatório.',
                'status.min' => 'O campo status deve conter no mínimo 3 caracteres.',
                'status.max' => 'O campo status deve conter no máximo 255 caracteres.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('administrador.index')
                ->withErrors($validator)
                ->withInput();
        }

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
        $validator = Validator::make(
            $dados->all(),
            [
                'nome' => 'required|min:3|max:255',
                'email' => 'required|email|max:255',
                'telefone' => 'required',
                'cpf' => 'required',
                'usuario' => 'required|min:3|max:255',
                'senha' => 'required|min:3|max:255',
                'status' => 'required|min:3|max:255',
            ],
            [
                'nome.required' => 'O campo nome é obrigatório.',
                'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',

                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'Informe um email válido.',
                'email.max' => 'O campo email deve conter no máximo 255 caracteres.',

                'telefone.required' => 'O campo telefone é obrigatório.',

                'cpf.required' => 'O campo CPF é obrigatório.',

                'usuario.required' => 'O campo usuário é obrigatório.',
                'usuario.min' => 'O campo usuário deve conter no mínimo 3 caracteres.',
                'usuario.max' => 'O campo usuário deve conter no máximo 255 caracteres.',

                'senha.required' => 'O campo senha é obrigatório.',
                'senha.min' => 'O campo senha deve conter no mínimo 3 caracteres.',
                'senha.max' => 'O campo senha deve conter no máximo 255 caracteres.',

                'status.required' => 'O campo status é obrigatório.',
                'status.min' => 'O campo status deve conter no mínimo 3 caracteres.',
                'status.max' => 'O campo status deve conter no máximo 255 caracteres.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $administrador = new \App\Models\AdministradorModel();

        $administrador = $administrador::find($dados->id);

        $administrador->update($dados->all());

        return view('administrador.atualizar', [
            'success' => 'Atualizado!',
            'administrador' => $administrador
        ]);
    }
}