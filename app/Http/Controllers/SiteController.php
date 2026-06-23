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

    
    public function profile()
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('site.login');
        }

        $usuario = Usuario::find(session('usuario_id'));

        return view('site.profile', compact('usuario'));
    }

 

    public function updateProfile(Request $request)
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('site.login');
        }

        $usuario = Usuario::find(session('usuario_id'));

        if (!$usuario) {
            return redirect()->route('site.login');
        }

        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048'
        ]);

        if ($request->hasFile('avatar')) {

            if (!file_exists(public_path('avatars'))) {
                mkdir(public_path('avatars'), 0777, true);
            }

            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('avatars'), $name);

            $usuario->avatar = $name;
        }

        $usuario->nome = $request->nome;
        $usuario->descricao = $request->descricao;

        $usuario->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }



    public function salvarCadastro(Request $request)
    {
     
        if (Usuario::where('email', $request->email)->exists()) {
            return redirect()->back()->with('erro', 'Este email já está cadastrado.');
        }

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        session([
            'usuario_id' => $usuario->id,
            'usuario_nome' => $usuario->nome,
        ]);

        return redirect()->route('site.profile');
    }



    public function fazerLogin(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario) {
            return redirect()->back()->with('erro', 'Usuário não encontrado');
        }

        if (!Hash::check($request->senha, $usuario->senha)) {
            return redirect()->back()->with('erro', 'Senha incorreta');
        }

        session([
            'usuario_id' => $usuario->id,
            'usuario_nome' => $usuario->nome,
        ]);

        return redirect()->route('site.profile');
    }

 
    public function logout()
    {
        session()->flush();
        return redirect()->route('site.login');
    }
}