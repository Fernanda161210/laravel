<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Tela de login.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Realiza o login.
     */
    public function autenticar(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'ativo' => true
        ])) {

            $request->session()->regenerate();

            if (auth()->user()->tipo == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'E-mail ou senha inválidos.'
        ]);
    }

    /**
     * Tela de cadastro.
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Salva novo usuário.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|max:255',
            'email'     => 'required|email|unique:users,email',
            'telefone'  => 'required|max:20',
            'cpf'       => 'required|max:14|unique:users,cpf',
            'password'  => 'required|min:6|confirmed'
        ]);

        User::create([

            'nome' => $request->nome,

            'email' => $request->email,

            'telefone' => $request->telefone,

            'cpf' => $request->cpf,

            'password' => Hash::make($request->password),

            'tipo' => 'cliente',

            'ativo' => true

        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}