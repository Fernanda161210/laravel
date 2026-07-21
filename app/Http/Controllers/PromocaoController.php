<?php

namespace App\Http\Controllers;

use App\Models\Promocao;
use Illuminate\Http\Request;

class PromocaoController extends Controller
{
    /**
     * Lista todas as promoções.
     */
    public function index()
    {
        $promocoes = Promocao::orderBy('data_inicio', 'desc')->get();

        return view('admin.promocoes.index', compact('promocoes'));
    }

    /**
     * Formulário de cadastro.
     */
    public function create()
    {
        return view('admin.promocoes.create');
    }

    /**
     * Salva uma nova promoção.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'          => 'required|string|max:255',
            'descricao'       => 'nullable|string',
            'desconto'        => 'required|numeric|min:0',
            'tipo_desconto'   => 'required|in:porcentagem,valor',
            'data_inicio'     => 'required|date',
            'data_fim'        => 'required|date|after_or_equal:data_inicio',
        ]);

        Promocao::create([
            'titulo'          => $request->titulo,
            'descricao'       => $request->descricao,
            'desconto'        => $request->desconto,
            'tipo_desconto'   => $request->tipo_desconto,
            'data_inicio'     => $request->data_inicio,
            'data_fim'        => $request->data_fim,
            'ativo'           => $request->has('ativo'),
        ]);

        return redirect()
            ->route('admin.promocoes')
            ->with('success', 'Promoção cadastrada com sucesso!');
    }

    /**
     * Exibe uma promoção.
     */
    public function show(string $id)
    {
        $promocao = Promocao::findOrFail($id);

        return view('admin.promocoes.show', compact('promocao'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(string $id)
    {
        $promocao = Promocao::findOrFail($id);

        return view('admin.promocoes.edit', compact('promocao'));
    }

    /**
     * Atualiza uma promoção.
     */
    public function update(Request $request, string $id)
    {
        $promocao = Promocao::findOrFail($id);

        $request->validate([
            'titulo'          => 'required|string|max:255',
            'descricao'       => 'nullable|string',
            'desconto'        => 'required|numeric|min:0',
            'tipo_desconto'   => 'required|in:porcentagem,valor',
            'data_inicio'     => 'required|date',
            'data_fim'        => 'required|date|after_or_equal:data_inicio',
        ]);

        $promocao->update([
            'titulo'          => $request->titulo,
            'descricao'       => $request->descricao,
            'desconto'        => $request->desconto,
            'tipo_desconto'   => $request->tipo_desconto,
            'data_inicio'     => $request->data_inicio,
            'data_fim'        => $request->data_fim,
            'ativo'           => $request->has('ativo'),
        ]);

        return redirect()
            ->route('admin.promocoes')
            ->with('success', 'Promoção atualizada com sucesso!');
    }

    /**
     * Remove uma promoção.
     */
    public function destroy(string $id)
    {
        $promocao = Promocao::findOrFail($id);

        $promocao->delete();

        return redirect()
            ->route('admin.promocoes')
            ->with('success', 'Promoção removida com sucesso!');
    }
}