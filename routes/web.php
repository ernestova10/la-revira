<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HermandadController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/que-ocurre', function () {
    return view('queOcurreSS.index'); 
});

Route::get('/celebraciones', function () {
    return view('celebraciones.index');
});

Route::get('/hermandades', [HermandadController::class, 'index'])->name('hermandades.index');
Route::get('/hermandades/{slug}', [HermandadController::class, 'show'])->name('hermandad.show');


Route::middleware(['auth'])->group(function () {

    // Perfil de Usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Vida Cofrade (Instagram)
    Route::get('/vida-cofrade', [InstagramController::class, 'index'])->name('vidaCofrade');

    // Gestión de Papeletas (Tickets)
    Route::get('/hermandades/{id}/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::post('/papeletas/comprar/{id}', [TicketController::class, 'buy'])->name('tickets.buy');
    Route::get('/perfil/mis-compras', [TicketController::class, 'myPurchases'])->name('profile.purchases');

    Route::middleware(['can:admin'])->group(function () {
        Route::post('/vida-cofrade/store', [InstagramController::class, 'store'])->name('admin.instagram.store');
        Route::delete('/vida-cofrade/{id}', [InstagramController::class, 'destroy'])->name('admin.instagram.destroy');
    });

});

require __DIR__.'/auth.php';