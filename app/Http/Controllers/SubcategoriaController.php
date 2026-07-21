<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Exibe todas as subcategorias.
     */
    public function index()
    {
        $subcategorias = Subcategoria::with('categoria')->get();

        return view('admin.subcategorias.index', compact('subcategorias'));
    }

    /**
     * Exibe o formulário de cadastro.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('admin.subcategorias.create', compact('categorias'));
    }

    /**
     * Salva uma nova subcategoria.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:100',
        ]);

        Subcategoria::create([
            'categoria_id' => $request->categoria_id,
            'nome' => $request->nome,
        ]);

        return redirect()
            ->route('admin.subcategorias')
            ->with('success', 'Subcategoria cadastrada com sucesso!');
    }

    /**
     * Exibe uma subcategoria.
     */
    public function show(string $id)
    {
        $subcategoria = Subcategoria::with('categoria')->findOrFail($id);

        return view('admin.subcategorias.show', compact('subcategoria'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('admin.subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    /**
     * Atualiza uma subcategoria.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:100',
        ]);

        $subcategoria = Subcategoria::findOrFail($id);

        $subcategoria->update([
            'categoria_id' => $request->categoria_id,
            'nome' => $request->nome,
        ]);

        return redirect()
            ->route('admin.subcategorias')
            ->with('success', 'Subcategoria atualizada com sucesso!');
    }

    /**
     * Remove uma subcategoria.
     */
    public function destroy(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);

        $subcategoria->delete();

        return redirect()
            ->route('admin.subcategorias')
            ->with('success', 'Subcategoria removida com sucesso!');
    }
}