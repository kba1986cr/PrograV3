<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestoController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;

Route::view('/', 'welcome')->name('home');
Route::view('nosotros', 'about')->name('about');
Route::view('contacto', 'contact')->name('contact');
// Route::view('inicio', 'loggin')->name('loggin');

Route::get('loggin', [CalendarioController::class, 'index'])->name('loggin')->middleware('auth');
Route::get('registrarPuesto', [PuestoController::class, 'create'])->name('registrarPuesto');
Route::resource('puestos', PuestoController::class);
Route::get('registrarHorarios', [EventoController::class, 'create'])->name('registrarHorarios');
Route::resource('horarios', EventoController::class);

// Calendario 

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar.index');

Route::post('/calendar/store', [CalendarioController::class, 'store'])->name('calendar.store');

// --------------------------------------------

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


