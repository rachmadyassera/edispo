<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;

Route::get('/', function () {
    return view('welcome');
});
// Rute Dashboard bawaan Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute khusus Operator
Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/surat-masuk/create', [LetterController::class, 'create'])->name('surat.create');
    Route::post('/surat-masuk', [LetterController::class, 'store'])->name('surat.store');
    Route::get('/surat-masuk', [LetterController::class, 'index'])->name('surat.index');
});

require __DIR__.'/auth.php';
