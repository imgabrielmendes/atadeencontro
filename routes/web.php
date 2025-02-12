<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsertsController;

use App\Models\home;
use App\Models\inserts;

/**
 * Rotas para o CADASTRO DO FORMULÁRIO 1
 */
Route::get('/', function () { return redirect('/home'); });
Route::get('/home', [HomeController::class, 'getHome'])->middleware(['auth', 'verified']);

/**
 * Rotas para o CADASTRO DO FORMULÁRIO 2
 */
Route::get('/participantes', [HomeController::class, 'participantes'])->middleware(['auth', 'verified']);

Route::post('/registrarata', [inserts::class, 'insertAta'])->middleware(['auth', 'verified']);
Route::post('/registrarparticipantes', [inserts::class, 'insertParticipantes'])->middleware(['auth', 'verified']);

Route::post('/registrartexto', [Inserts::class, 'insertTextoPrincipal'])->middleware(['auth', 'verified']);


Route::get('/ata/{id}', [HomeController::class, 'getParticipantesPage'])->middleware(['auth', 'verified'])->middleware(['auth', 'verified']);
Route::get('/ata/deliberacoes/{id}', [HomeController::class, 'getDeliberacoesPage'])->middleware(['auth', 'verified']);

Route::post('/registrardeliberacao', [Inserts::class, 'insertDeliberacoes'])->middleware(['auth', 'verified']);

Route::post('/finalizarata', [home::class, 'finalizarAta'])->middleware(['auth', 'verified']);

Route::get('/historico', [HomeController::class, 'getHistoricoPage'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return redirect('/home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
