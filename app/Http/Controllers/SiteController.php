<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function cadastro()
    {
        return view('site.cadastro');
    }

    public function login()
    {
        return view('site.login');
    }

    public function lumi()
    {
        return view('site.lumi');
    }

    

    public function worlds()
    {
        return view('site.worlds');
    }

    /* =========================
        WORLDS INDIVIDUAIS
    ========================== */

    // ⚔️ HISTÓRIA (LIBERADO)
    public function history()
    {
        return view('site.worlds.history');
    }

    
    public function math()
    {
        return view('site.worlds.math');

        
    }

   
    public function science()
    {
        return view('site.worlds.science');
    }

    /* =========================
        PROFILE
    ========================== */

    public function profile()
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('site.login');
        }

        return view('site.profile');
    }

    public function updateProfile(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $arquivo = $request->file('avatar');

            $nomeArquivo = time() . '.' . $arquivo->getClientOriginalExtension();

            $arquivo->move(public_path('avatars'), $nomeArquivo);

            session(['avatar' => $nomeArquivo]);
        }

        session([
            'nome' => $request->nome,
            'nivel' => $request->nivel,
            'xp' => $request->xp,
            'descricao' => $request->descricao
        ]);

        return redirect()
            ->back()
            ->with('success', 'Perfil atualizado com sucesso!');
    }

    /* =========================
        CADASTRO
    ========================== */

    public function salvarCadastro(Request $request)
    {
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha)
        ]);

        session([
            'usuario_id' => $usuario->id,
            'usuario_nome' => $usuario->nome,
            'nivel' => 1 // 👈 começa nível 1
        ]);

        return redirect()->route('site.profile');
    }

    /* =========================
        LOGIN
    ========================== */

    public function fazerLogin(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {

            session([
                'usuario_id' => $usuario->id,
                'usuario_nome' => $usuario->nome,
                'nivel' => 1 // ou puxar do banco depois
            ]);

            return redirect()->route('site.profile');
        }

        return redirect()->back()->with('erro', 'Email ou senha inválidos.');
    }

    /* =========================
        LOGOUT
    ========================== */

    public function logout()
    {
        session()->flush();

        return redirect()->route('site.login');
    }
}