<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas Públicas (Cualquiera puede verlas)
Route::get('/que-ocurre', function () {
    return view('queOcurreSS.index'); 
});

Route::get('/celebraciones', function () {
    return view('celebraciones.index');
});

// Ruta dinámica para las hermandades
Route::get('/hermandades', [App\Http\Controllers\HermandadController::class, 'index'])->name('hermandades.index');
Route::get('/hermandades/{slug}', [App\Http\Controllers\HermandadController::class, 'show'])->name('hermandad.show');

// Rutas protegidas por login
Route::middleware(['auth'])->group(function () {
    Route::get('/vida-cofrade', function () {
        return view('vidaCofrade.index');
    })->name('vidaCofrade');
});

use App\Http\Controllers\InstagramController;

// 1. Ruta pública para ver la Vida Cofrade (solo usuarios logueados)
Route::middleware(['auth'])->group(function () {
    Route::get('/vida-cofrade', [InstagramController::class, 'index'])->name('vidaCofrade');
});

// 2. Rutas de ADMINISTRADOR (solo tú)
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::post('/vida-cofrade/store', [InstagramController::class, 'store'])->name('admin.instagram.store');
    Route::delete('/vida-cofrade/{id}', [InstagramController::class, 'destroy'])->name('admin.instagram.destroy');
});

require __DIR__.'/auth.php';
