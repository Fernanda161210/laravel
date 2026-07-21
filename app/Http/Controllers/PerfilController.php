<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Exibe o perfil do usuário.
     */
    public function index()
    {
        $usuario = Auth::user();

        return view('cliente.perfil', compact('usuario'));
    }

    /**
     * Atualiza os dados do perfil.
     */
    public function update(Request $request)
    {
        $usuario = Auth::user();

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'telefone' => 'required|max:20',
            'cpf' => 'required|max:14|unique:users,cpf,' . $usuario->id,

            'cep' => 'nullable|max:9',
            'logradouro' => 'nullable|max:255',
            'numero' => 'nullable|max:20',
            'complemento' => 'nullable|max:255',
            'bairro' => 'nullable|max:100',
            'cidade' => 'nullable|max:100',
            'estado' => 'nullable|max:2',

            'foto' => 'nullable|image|max:2048',
        ]);

        $dados = $request->except('password', 'password_confirmation');

        // Upload da foto
        if ($request->hasFile('foto')) {

            if ($usuario->foto) {
                Storage::disk('public')->delete($usuario->foto);
            }

            $dados['foto'] = $request
                ->file('foto')
                ->store('usuarios', 'public');
        }

        // Alteração de senha
        if ($request->filled('password')) {

            $request->validate([
                'password' => 'confirmed|min:6',
            ]);

            $dados['password'] = Hash::make($request->password);
        }

        $usuario->update($dados);

        return redirect()
            ->back()
            ->with('success', 'Perfil atualizado com sucesso!');
    }
}