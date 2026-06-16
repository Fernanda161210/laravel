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

    public function racemind()
    {
        return view('site.racemind');
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

    // 📐 MATEMÁTICA (BLOQUEADO NÍVEL 9+)
    public function math()
    {
        $nivel = session('nivel', 1);

        if ($nivel < 9) {
            return redirect()
                ->route('site.worlds')
                ->with('erro', '🔒 Mundo bloqueado! Alcance nível 9 (Veterano) para liberar Matemática.');
        }

        return view('site.bloqueado');
    }

    // 🧪 CIÊNCIA (BLOQUEADO NÍVEL 9+)
    public function science()
    {
        $nivel = session('nivel', 1);

        if ($nivel < 9) {
            return redirect()
                ->route('site.worlds')
                ->with('erro', '🔒 Mundo bloqueado! Alcance nível 12 (Veterano) para liberar Ciência.');
        }

        return view('site.bloqueado');
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