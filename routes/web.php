<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KebudayaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/kebudayaan', [KebudayaanController::class, 'index'])->name('kebudayaan');
Route::get('/user/kebudayaan/{id}', [KebudayaanController::class, 'show'])->name('kebudayaan.detail');
Route::get('/kebudayaan/{category}', [KebudayaanController::class, 'index'])->name('user.kebudayaan');


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogDetail');

Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');

Route::get('/kiprah', function () {
  return view('user.kiprah');
})->name('kiprah');

Route::get('/tentang', function () {
  return view('user.tentang');
})->name('tentang');

Route::resource('reports', ReportController::class);
Route::post('/kebudayaan', [ReportController::class, 'store'])->name('store-report');
Route::post('reports/{report}/status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');;

Route::get('/status', [ReportController::class, 'showStatus'])
    ->middleware(['auth'])
    ->name('status');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
