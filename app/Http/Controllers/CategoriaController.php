<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Exibe todas as categorias.
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Exibe o formulário de cadastro.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Salva uma nova categoria.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:categorias,nome',
        ]);

        Categoria::create([
            'nome' => $request->nome,
        ]);

        return redirect()
            ->route('admin.categorias')
            ->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Exibe uma categoria.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza uma categoria.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:100|unique:categorias,nome,' . $id,
        ]);

        $categoria->update([
            'nome' => $request->nome,
        ]);

        return redirect()
            ->route('admin.categorias')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove uma categoria.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()
            ->route('admin.categorias')
            ->with('success', 'Categoria removida com sucesso!');
    }
}