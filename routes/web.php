<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

Route::get('/kebudayaan-detail', function () {
  return view('user.kebudayaanDetail');
})->name('kebudayaanDetail');

Route::get('/blog', function () {
  return view('user.blog');
})->name('blog');

Route::get('/blog-detail', function () {
  return view('user.blogDetail');
})->name('blogDetail');

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');

Route::get('/kiprah', function () {
  return view('user.kiprah');
})->name('kiprah');

Route::get('/tentang', function () {
  return view('user.tentang');
})->name('tentang');

Route::resource('reports', ReportController::class);
Route::post('/kebudayaan', [ReportController::class, 'store'])->name('store-report');
Route::post('reports/{report}/status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');

// Route::get('/status', function () {
//   return view('user.statusLapor');
// })->name('status');

Route::get('/status', [ReportController::class, 'showStatus'])
    ->middleware(['auth'])
    ->name('status');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
