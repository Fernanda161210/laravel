<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Lista todos os usuários.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Pesquisa
        if ($request->filled('pesquisa')) {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->pesquisa . '%')
                  ->orWhere('email', 'like', '%' . $request->pesquisa . '%')
                  ->orWhere('cpf', 'like', '%' . $request->pesquisa . '%');
            });
        }

        // Filtro por tipo
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        // Filtro por status
        if ($request->filled('ativo')) {
            $query->where('ativo', $request->ativo);
        }

        $usuarios = $query
            ->orderBy('nome')
            ->paginate(15);

        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Formulário de cadastro.
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Salva um novo usuário.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'cpf' => 'required|max:14|unique:users,cpf',
            'telefone' => 'required|max:20',
            'password' => 'required|min:6|confirmed',
            'tipo' => 'required|in:admin,cliente',
        ]);

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
            'ativo' => $request->has('ativo'),
        ]);

        return redirect()
            ->route('admin.usuarios')
            ->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Exibe um usuário.
     */
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Atualiza um usuário.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'cpf' => 'required|max:14|unique:users,cpf,' . $usuario->id,
            'telefone' => 'required|max:20',
            'tipo' => 'required|in:admin,cliente',
        ]);

        $dados = [
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'tipo' => $request->tipo,
            'ativo' => $request->has('ativo'),
        ];

        if ($request->filled('password')) {

            $request->validate([
                'password' => 'min:6|confirmed',
            ]);

            $dados['password'] = Hash::make($request->password);
        }

        $usuario->update($dados);

        return redirect()
            ->route('admin.usuarios')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Exclui um usuário.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        // Evita excluir o próprio administrador logado
        if (auth()->id() == $usuario->id) {
            return redirect()
                ->back()
                ->with('error', 'Você não pode excluir sua própria conta.');
        }

        $usuario->delete();

        return redirect()
            ->route('admin.usuarios')
            ->with('success', 'Usuário removido com sucesso!');
    }

    /**
     * Ativa ou desativa um usuário.
     */
    public function alterarStatus(string $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->ativo = !$usuario->ativo;

        $usuario->save();

        return redirect()
            ->back()
            ->with('success', 'Status alterado com sucesso!');
    }
}