<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/logout', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('logout');

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('/');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/addbooks', function(){
    return view('addbooks');
});

Route::get('/addbooks', [BookController::class, 'index'])->name('addbooks');
Route::post('/addbooks/submit', [BookController::class, 'submitbook'])->name('addbooks/submit');
Route::get('/', [BookController::class, 'store'])->name('welcome');

// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/bookdetails', function () {
    return view('bookdetails');
})->name('bookdetails');

Route::get('/bookdetails/{id}', [BookController::class, 'get_id'])->name('bookdetails.id');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes();
