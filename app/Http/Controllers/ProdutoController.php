<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//lista todos os produtos
    {
        //$produtos = Produto::where('preco', '<', 10); tem que arruma
        $produtos = Produto::all();
        return view('produtos', ['produtos' => $produtos]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //formulario de cadastro

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //mostra detalhes do produto
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::destroy($id);
        $produtos = Produto::all();
        return view('produtos', ['produtos' => $produtos]);

       //  Produto::find($id);
      // return view('detalhes-produtos',['produto'=>$produto]);
      
    }
}
