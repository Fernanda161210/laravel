<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Principal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', [Principal::class, 'principal'])->name('principal');

// Grupo de rotas do site
Route::prefix('site')->group(function () {

    Route::get('/home', [SiteController::class, 'index'])
        ->name('site.index');

    Route::get('/cadastro', [SiteController::class, 'cadastro'])
        ->name('site.cadastro');

    Route::get('/dashboard', [SiteController::class, 'dashboard'])
        ->name('site.dashboard');

    Route::get('/login', [SiteController::class, 'login'])
        ->name('site.login');

    Route::get('/lumi', [SiteController::class, 'lumi'])
        ->name('site.lumi');

    Route::get('/profile', [SiteController::class, 'profile'])
        ->name('site.profile');

    Route::get('/racemind', [SiteController::class, 'racemind'])
        ->name('site.racemind');

    Route::get('/shop', [SiteController::class, 'shop'])
        ->name('site.shop');

    Route::get('/worlds', [SiteController::class, 'worlds'])
        ->name('site.worlds');

    // Atualizar perfil
    Route::post('/profile/update', [SiteController::class, 'updateProfile'])
        ->name('site.profile.update');

});