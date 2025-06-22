<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsertsController;

use App\Models\home;
use App\Models\inserts;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'getHome'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return redirect('/home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/participantes', [HomeController::class, 'participantes']);

    Route::get('/historico', [HomeController::class, 'getHistoricoPage']);

    Route::prefix('ata')->group(function () {
        Route::get('/{id}', [HomeController::class, 'getParticipantesPage']);
        Route::get('/deliberacoes/{id}', [HomeController::class, 'getDeliberacoesPage']);
    });

    Route::post('/registrarata', [inserts::class, 'insertAta']);
    Route::post('/registrarparticipantes', [inserts::class, 'insertParticipantes']);
    
    Route::post('/registrartexto', [Inserts::class, 'insertTextoPrincipal']);
    Route::post('/registrardeliberacao', [Inserts::class, 'insertDeliberacoes']);
    
    Route::post('/finalizarata', [home::class, 'finalizarAta']);

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
