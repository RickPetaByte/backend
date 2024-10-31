<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', [BookController::class, 'index'])->name('welcome');

Route::get('/addbooks', [BookController::class, 'create'])->name('addbooks');

Route::post('/addbooks/submit', [BookController::class, 'store'])->name('books.store');

Route::get('/bookdetails/{id}', [BookController::class, 'show'])->name('bookdetails');
Route::get('/bookedit/{id}', [BookController::class, 'edit'])->name('bookedit');
Route::post('/bookedit/{id}', [BookController::class, 'update'])->name('bookedit');
Route::delete('/bookdelete/{id}', [BookController::class, 'destroy'])->name('bookdelete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();
