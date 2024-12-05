<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('nosotros', 'about')->name('about');
Route::view('contacto', 'contact')->name('contact');
// Route::view('inicio', 'loggin')->name('loggin');

Route::get('loggin', [CalendarioController::class, 'index'])->name('loggin')->middleware('auth');

// Route::get('/calendario', [CalendarioController::class, 'index']);
// Route::post('/calendario/guardar', [CalendarioController::class, 'guardar']);
// Route::put('/calendario/actualizar/{id}', [CalendarioController::class, 'actualizar']);
// Route::delete('/calendario/eliminar/{id}', [CalendarioController::class, 'eliminar']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
