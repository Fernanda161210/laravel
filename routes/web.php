<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| PÁGINA INICIAL (HOME)
|--------------------------------------------------------------------------
| Agora "/" abre direto o home do site
*/

Route::get('/', [SiteController::class, 'index'])->name('site.index');

/*
|--------------------------------------------------------------------------
| ROTAS DO SITE
|--------------------------------------------------------------------------
*/

Route::prefix('site')->group(function () {

    /* =======================
        PÁGINAS PRINCIPAIS
    ======================== */

    Route::get('/home', [SiteController::class, 'index'])->name('site.home');

    Route::get('/cadastro', [SiteController::class, 'cadastro'])->name('site.cadastro');

    Route::get('/login', [SiteController::class, 'login'])->name('site.login');

    Route::get('/profile', [SiteController::class, 'profile'])->name('site.profile');

    Route::get('/lumi', [SiteController::class, 'lumi'])->name('site.lumi');

    Route::get('/racemind', [SiteController::class, 'racemind'])->name('site.racemind');

    Route::get('/worlds', [SiteController::class, 'worlds'])->name('site.worlds');

    /* =======================
        AÇÕES (POST)
    ======================== */

    Route::post('/profile/update', [SiteController::class, 'updateProfile'])
        ->name('site.profile.update');

    Route::post('/cadastro', [SiteController::class, 'salvarCadastro'])
        ->name('site.salvarCadastro');

    Route::post('/login', [SiteController::class, 'fazerLogin'])
        ->name('site.fazerLogin');

    Route::post('/logout', [SiteController::class, 'logout'])
        ->name('site.logout');

    /* =======================
        WORLDS (JOGOS)
    ======================== */

    // ⚔️ HISTÓRIA (LIBERADO)
    Route::get('/worlds/history', [SiteController::class, 'history'])
        ->name('site.worlds.history');

    // 📐 MATEMÁTICA (BLOQUEADO NIVEL 9+)
    Route::get('/worlds/math', [SiteController::class, 'math'])
        ->name('site.bloqueado');

    // 🧪 CIÊNCIA (BLOQUEADO NIVEL 9+)
    Route::get('/worlds/science', [SiteController::class, 'science'])
        ->name('site.bloqueado');

});