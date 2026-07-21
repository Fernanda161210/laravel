<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Promocao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos.
     */
    public function index(Request $request)
    {
        $query = Produto::with(['categoria', 'subcategoria']);

        // Pesquisa por nome
        if ($request->filled('pesquisa')) {
            $query->where('nome', 'like', '%' . $request->pesquisa . '%');
        }

        // Filtro por categoria
        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }

        // Filtro por subcategoria
        if ($request->filled('subcategoria')) {
            $query->where('subcategoria_id', $request->subcategoria);
        }

        // Apenas produtos em promoção
        if ($request->filled('promocao')) {
            $query->where('promocao', true);
        }

        // Apenas produtos em destaque
        if ($request->filled('destaque')) {
            $query->where('destaque', true);
        }

        // Apenas ativos
        if ($request->filled('ativo')) {
            $query->where('ativo', true);
        }

        $produtos = $query->orderBy('nome')->paginate(15);

        $categorias = Categoria::orderBy('nome')->get();
        $subcategorias = Subcategoria::orderBy('nome')->get();

        return view('admin.produtos.index', compact(
            'produtos',
            'categorias',
            'subcategorias'
        ));
    }

    /**
     * Formulário de cadastro.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $promocoes = Promocao::all();

        return view('admin.produtos.create', compact(
            'categorias',
            'subcategorias',
            'promocoes'
        ));
    }

    /**
     * Salva produto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => 'required|exists:subcategorias,id',

            'nome' => 'required|max:255',
            'marca' => 'nullable|max:100',
            'descricao' => 'required',

            'preco' => 'required|numeric',
            'preco_promocional' => 'nullable|numeric',

            'estoque' => 'required|integer',

            'imagem' => 'nullable|image|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {

            $dados['imagem'] = $request
                ->file('imagem')
                ->store('produtos', 'public');
        }

        Produto::create($dados);

        return redirect()
            ->route('admin.produtos')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Visualizar produto.
     */
    public function show(string $id)
    {
        $produto = Produto::with([
            'categoria',
            'subcategoria'
        ])->findOrFail($id);

        return view('admin.produtos.show', compact('produto'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);

        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $promocoes = Promocao::all();

        return view('admin.produtos.edit', compact(
            'produto',
            'categorias',
            'subcategorias',
            'promocoes'
        ));
    }

    /**
     * Atualiza produto.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => 'required|exists:subcategorias,id',

            'nome' => 'required|max:255',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',

            'imagem' => 'nullable|image|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {

            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }

            $dados['imagem'] = $request
                ->file('imagem')
                ->store('produtos', 'public');
        }

        $produto->update($dados);

        return redirect()
            ->route('admin.produtos')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Excluir produto.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);

        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()
            ->route('admin.produtos')
            ->with('success', 'Produto removido com sucesso!');
    }
}