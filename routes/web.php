<?php

// use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('nosotros', 'about')->name('about');
Route::view('contacto', 'contact')->name('contact');
Route::view('inicio', 'loggin')->name('loggin')->middleware('auth');; 




// Route::get('/inicio', [PostController::class, 'index'])->name('loggin')->middleware('auth');
// Route::post('/gestionarTurno', [PostController::class, 'gestionarTurno']);
// Route::post('/gestionar-turno', [PostController::class, 'gestionarTurno'])->name('gestionar-turno');

// Route::get('inicio', [PostController::class, 'index'])->name('loggin');
// Route::post('turnos', [CalendarioController::class, 'store']);
// Route::put('turnos/{id}', [CalendarioController::class, 'update']);
// Route::delete('turnos/{id}', [CalendarioController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
