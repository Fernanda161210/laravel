<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Principal::class, 'principal']) ->name('pagina-inicial');

Route::prefix('publico')->group(function(){
Route::get('/contato/{nome}', [App\Http\Controllers\Principal::class, 'contato']);
//www.minhaaplicação.com.br/contato/nome_que_quiser
Route::get('/contato/{nome}/{sobrenome}', [App\Http\Controllers\Principal::class, 'contatoNomeCompleto']);
Route::get('/contato/{nome}/{sobrenome}/{assunto}', [App\Http\Controllers\Principal::class, 'assunto']);
Route::get('/contato/{nome}/{sobrenome}/{assunto}/{email}/{telefone?}', [App\Http\Controllers\Principal::class, 'mensagem']);
//telefone opcional telefone? não é obrigatório preencher    
});


Route::fallback(function(){
    echo "A rota acessada não existe";
    echo "<a href='". route('pagina-inicial')."'>Voltar</a>";
});
