<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
  return view('layouts.home');
})->name('home');

Route::resources(['categories' => CategoryController::class]);
Route::resources(['word' => WordController::class]);
Route::resources(['game' => GameController::class]);
Route::post('game/{id}/letter', [GameController::class, 'insertLetter'])->name('game.letter');

require __DIR__.'/auth.php';
