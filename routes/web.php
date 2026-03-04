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

Route::get('/', [App\Http\Controllers\Principal::class, 'home'])->name('pagina-incial');//apelido para se mudar a url só chama o apelido
Route::get('/sobre', [App\Http\Controllers\Sobre::class, 'about'])->name('pagina-sobre');
//get pega os dados
// post insere
// put atualiza
//delete apaga




