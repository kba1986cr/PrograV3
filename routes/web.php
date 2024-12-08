<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestoController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::view('/', 'welcome')->name('home');
Route::view('nosotros', 'about')->name('about');
Route::view('contacto', 'contact')->name('contact');
// Route::view('inicio', 'loggin')->name('loggin');

Route::get('loggin', [CalendarioController::class, 'index'])->name('loggin')->middleware('auth');
Route::get('/api/eventos', [EventoController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
});

Route::post('/send-message', [ContactController::class, 'sendMessage']);
Route::view('registrarDatos', 'registrarDatos')->name('registrarDatos');
Route::get('/registrarDatos/1', [PuestoController::class, 'show']);

// Route::get('/api/eventos', [EventoController::class, 'index']);


// Route::get('/calendario', [CalendarioController::class, 'index']);
// Route::post('/calendario/guardar', [CalendarioController::class, 'guardar']);
// Route::put('/calendario/actualizar/{id}', [CalendarioController::class, 'actualizar']);
// Route::delete('/calendario/eliminar/{id}', [CalendarioController::class, 'eliminar']);

// Rutas principales
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Rutas del calendario    
// Route::middleware('auth')->group(function () {
    
//     Route::get('loggin', [CalendarioController::class, 'index'])->name('loggin');

//     Route::get('/turnos/{fecha}', [CalendarioController::class, 'show'])->name('turnos.show');;

//     Route::post('turnos', [CalendarioController::class, 'store']);
//     Route::put('turnos/{id}', [CalendarioController::class, 'update']);
//     Route::delete('turnos/{id}', [CalendarioController::class, 'destroy']);
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación
require __DIR__.'/auth.php';
