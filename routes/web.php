<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsertsController;

use App\Models\home;
use App\Models\inserts;


Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'getHome'])->middleware(['auth', 'verified']);

Route::get('/participantes', [HomeController::class, 'participantes'])->middleware(['auth', 'verified']);

Route::post('/registrarata', [inserts::class, 'insertAta']);
Route::get('/ata/{id}', [HomeController::class, 'getParticipantesPage']);

Route::post('/registrarparticipantes', [inserts::class, 'insertParticipantes']);
Route::get('/ata/deliberacoes/{id}', [HomeController::class, 'getDeliberacoesPage']);

Route::post('/registrartexto', [inserts::class, 'insertTextoPrincipal']);


Route::get('/historico', [HomeController::class, 'getHistoricoPage']);

Route::get('/dashboard', function () {
    return redirect('/home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
