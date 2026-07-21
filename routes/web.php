<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SITE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/produtos', function () {
    return view('produtos.index');
})->name('produtos');

Route::get('/produto/{id}', function ($id) {
    return view('produtos.show');
})->name('produto.show');

Route::get('/categorias/{categoria}', function ($categoria) {
    return view('categorias.index');
})->name('categorias');

Route::get('/promocoes', function () {
    return view('promocoes.index');
})->name('promocoes');

Route::get('/carrinho', function () {
    return view('carrinho.index');
})->name('carrinho');


/*
|--------------------------------------------------------------------------
| AUTENTICAÇÃO
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/cadastro', function () {
    return view('auth.register');
})->name('register');


/*
|--------------------------------------------------------------------------
| ÁREA DO CLIENTE
|--------------------------------------------------------------------------
*/

Route::prefix('cliente')->group(function () {

    Route::get('/', function () {
        return view('cliente.dashboard');
    })->name('cliente.dashboard');

    Route::get('/perfil', function () {
        return view('cliente.perfil');
    })->name('cliente.perfil');

    Route::get('/pedidos', function () {
        return view('cliente.pedidos');
    })->name('cliente.pedidos');

});


/*
|--------------------------------------------------------------------------
| PAINEL ADMINISTRATIVO
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Produtos
    |--------------------------------------------------------------------------
    */

    Route::get('/produtos', function () {
        return view('admin.produtos.index');
    })->name('admin.produtos');

    Route::get('/produtos/create', function () {
        return view('admin.produtos.create');
    })->name('admin.produtos.create');

    Route::get('/produtos/{id}', function ($id) {
        return view('admin.produtos.show');
    })->name('admin.produtos.show');

    Route::get('/produtos/{id}/edit', function ($id) {
        return view('admin.produtos.edit');
    })->name('admin.produtos.edit');

    /*
    |--------------------------------------------------------------------------
    | Categorias
    |--------------------------------------------------------------------------
    */

    Route::get('/categorias', function () {
        return view('admin.categorias.index');
    })->name('admin.categorias');

    Route::get('/categorias/create', function () {
        return view('admin.categorias.create');
    })->name('admin.categorias.create');

    Route::get('/categorias/{id}/edit', function ($id) {
        return view('admin.categorias.edit');
    })->name('admin.categorias.edit');

    /*
    |--------------------------------------------------------------------------
    | Subcategorias
    |--------------------------------------------------------------------------
    */

    Route::get('/subcategorias', function () {
        return view('admin.subcategorias.index');
    })->name('admin.subcategorias');

    Route::get('/subcategorias/create', function () {
        return view('admin.subcategorias.create');
    })->name('admin.subcategorias.create');

    Route::get('/subcategorias/{id}/edit', function ($id) {
        return view('admin.subcategorias.edit');
    })->name('admin.subcategorias.edit');

    /*
    |--------------------------------------------------------------------------
    | Clientes
    |--------------------------------------------------------------------------
    */

    Route::get('/clientes', function () {
        return view('admin.clientes.index');
    })->name('admin.clientes');

    Route::get('/clientes/{id}', function ($id) {
        return view('admin.clientes.show');
    })->name('admin.clientes.show');

    /*
    |--------------------------------------------------------------------------
    | Pedidos
    |--------------------------------------------------------------------------
    */

    Route::get('/pedidos', function () {
        return view('admin.pedidos.index');
    })->name('admin.pedidos');

    Route::get('/pedidos/{id}', function ($id) {
        return view('admin.pedidos.show');
    })->name('admin.pedidos.show');

    /*
    |--------------------------------------------------------------------------
    | Promoções
    |--------------------------------------------------------------------------
    */

    Route::get('/promocoes', function () {
        return view('admin.promocoes.index');
    })->name('admin.promocoes');

    Route::get('/promocoes/create', function () {
        return view('admin.promocoes.create');
    })->name('admin.promocoes.create');

    Route::get('/promocoes/{id}/edit', function ($id) {
        return view('admin.promocoes.edit');
    })->name('admin.promocoes.edit');

    /*
    |--------------------------------------------------------------------------
    | Banners
    |--------------------------------------------------------------------------
    */

    Route::get('/banners', function () {
        return view('admin.banners.index');
    })->name('admin.banners');

    Route::get('/banners/create', function () {
        return view('admin.banners.create');
    })->name('admin.banners.create');

    Route::get('/banners/{id}/edit', function ($id) {
        return view('admin.banners.edit');
    })->name('admin.banners.edit');

    /*
    |--------------------------------------------------------------------------
    | Relatórios
    |--------------------------------------------------------------------------
    */

    Route::get('/relatorios', function () {
        return view('admin.relatorios.index');
    })->name('admin.relatorios');

    /*
    |--------------------------------------------------------------------------
    | Configurações
    |--------------------------------------------------------------------------
    */

    Route::get('/configuracoes', function () {
        return view('admin.configuracoes.index');
    })->name('admin.configuracoes');

});