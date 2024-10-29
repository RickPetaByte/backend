<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;


Route::get('/dashboard', function () {
    return view('dashboard');
});

// // Route::get('/', function () {
// //     return view('welcome');
// // })->middleware(['auth

// Route::get('/addbooks', function(){
//     return view('addbooks');
// });

// Route::get('/addbooks', [BookController::class, 'index'])->name('addbooks');
// Route::get('/addbooks', function () {
//     return view('addbooks');
// });

Route::get('/', [BookController::class, 'index'])->name('welcome');

Route::get('/addbooks', [BookController::class, 'create'])->name('addbooks');

Route::post('/addbooks/submit', [BookController::class, 'store'])->name('books.store');

Route::get('/books/{id}', [BookController::class, 'get_id'])->name('bookdetails');

//Route::post('/addbooks/submit', [BookController::class, 'store'])->name('addbooks/submit');

// Route::get('/', [BookController::class, 'index'])->name('books');
// Route::get('/', [BookController::class, 'store'])->name('welcome');

// // Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// // Route::post('login', [LoginController::class, 'login']);
// // Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/bookdetails', function () {
//     return view('bookdetails');
// })->name('bookdetails');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();
