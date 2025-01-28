<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
})-> name('home');

// Route::get('/dashboard', function () {
//     return view('user.home');
// })->middleware(['auth', 'verified'])->name('home');

// Rute-rute untuk halaman umum (user)
Route::get('/kebudayaan', function () {
  return view('user.kebudayaan');
})->name('kebudayaan');

Route::get('/blog', function () {
  return view('user.blog');
})->name('blog');

Route::get('/galeri', function () {
  return view('user.galeri');
})->name('galeri');

Route::get('/kiprah', function () {
  return view('user.kiprah');
})->name('kiprah');

Route::get('/tentang', function () {
  return view('user.tentang');
})->name('tentang');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
