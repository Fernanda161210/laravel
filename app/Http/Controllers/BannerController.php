<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Lista todos os banners.
     */
    public function index()
    {
        $banners = Banner::orderBy('ordem')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Formulário de cadastro.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Salva um banner.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'subtitulo' => 'nullable|max:255',
            'imagem' => 'required|image|max:2048',
            'link' => 'nullable|max:255',
            'ordem' => 'required|integer|min:1',
            'ativo' => 'nullable|boolean',
        ]);

        $dados = $request->all();

        $dados['imagem'] = $request
            ->file('imagem')
            ->store('banners', 'public');

        $dados['ativo'] = $request->has('ativo');

        Banner::create($dados);

        return redirect()
            ->route('admin.banners')
            ->with('success', 'Banner cadastrado com sucesso!');
    }

    /**
     * Exibe um banner.
     */
    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.show', compact('banner'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Atualiza um banner.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'titulo' => 'required|max:255',
            'subtitulo' => 'nullable|max:255',
            'imagem' => 'nullable|image|max:2048',
            'link' => 'nullable|max:255',
            'ordem' => 'required|integer|min:1',
            'ativo' => 'nullable|boolean',
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {

            if ($banner->imagem) {
                Storage::disk('public')->delete($banner->imagem);
            }

            $dados['imagem'] = $request
                ->file('imagem')
                ->store('banners', 'public');
        }

        $dados['ativo'] = $request->has('ativo');

        $banner->update($dados);

        return redirect()
            ->route('admin.banners')
            ->with('success', 'Banner atualizado com sucesso!');
    }

    /**
     * Remove um banner.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->imagem) {
            Storage::disk('public')->delete($banner->imagem);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banners')
            ->with('success', 'Banner removido com sucesso!');
    }
}