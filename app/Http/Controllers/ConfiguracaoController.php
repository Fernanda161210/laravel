<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracaoController extends Controller
{
    /**
     * Exibe a página de configurações.
     */
    public function index()
    {
        $configuracao = Configuracao::first();

        return view('admin.configuracoes.index', compact('configuracao'));
    }

    /**
     * Atualiza as configurações da loja.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nome_loja' => 'required|max:255',
            'cnpj' => 'nullable|max:18',
            'email' => 'required|email',
            'telefone' => 'required|max:20',
            'whatsapp' => 'required|max:20',

            'cep' => 'nullable|max:9',
            'logradouro' => 'nullable|max:255',
            'numero' => 'nullable|max:20',
            'bairro' => 'nullable|max:100',
            'cidade' => 'nullable|max:100',
            'estado' => 'nullable|max:2',

            'instagram' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',

            'horario_funcionamento' => 'nullable',

            'valor_frete' => 'required|numeric|min:0',
            'frete_gratis' => 'nullable|numeric|min:0',

            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,jpeg,svg|max:1024',
        ]);

        $configuracao = Configuracao::first();

        if (!$configuracao) {
            $configuracao = new Configuracao();
        }

        $dados = $request->except(['logo', 'favicon']);

        // Upload da logo
        if ($request->hasFile('logo')) {

            if ($configuracao->logo) {
                Storage::disk('public')->delete($configuracao->logo);
            }

            $dados['logo'] = $request
                ->file('logo')
                ->store('configuracoes', 'public');
        }

        // Upload do favicon
        if ($request->hasFile('favicon')) {

            if ($configuracao->favicon) {
                Storage::disk('public')->delete($configuracao->favicon);
            }

            $dados['favicon'] = $request
                ->file('favicon')
                ->store('configuracoes', 'public');
        }

        $configuracao->fill($dados);
        $configuracao->save();

        return redirect()
            ->back()
            ->with('success', 'Configurações atualizadas com sucesso!');
    }
}