<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KebudayaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(Authenticate::class)->group(function () {
  Route::get('/dashboard', function () {
      return view('home');
  });
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/verify-code', [RegisteredUserController::class, 'showVerificationForm'])->name('verify.code.form');
Route::post('/verify-code', [RegisteredUserController::class, 'verifyCode'])->name('verify.code.submit');

// Rute Form Tambahan Internal
Route::get('/internal/complete-form', [RegisteredUserController::class, 'showInternalForm'])->name('internal.complete.form');
Route::post('/internal/complete-form', [RegisteredUserController::class, 'storeInternalData'])->name('internal.store');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);


Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

// Route::post('/logout', function (Request $request) {
//       if (Auth::guard('internal')->check()) {
//           Auth::guard('internal')->logout();
//       }
  
//       if (Auth::guard('web')->check()) {
//           Auth::guard('web')->logout();
//       }
  
//       if (Auth::guard('admin')->check()) {
//           Auth::guard('admin')->logout();
//       }
  
//       $request->session()->invalidate();
//       $request->session()->regenerateToken();
  
//       return redirect('/');
// })->name('logout');
  
// Route::post('/logout', function (Request $request) {
//   Auth::guard('web')->logout();
//   Auth::guard('internal')->logout();
//   $request->session()->invalidate();
//   $request->session()->regenerateToken();
//   return redirect('/');
// })->name('logout')->middleware('auth:web,internal');

// Route::post('/logout-internal', function (Request $request) {
//   Auth::guard('internal')->logout();
//   $request->session()->invalidate();
//   $request->session()->regenerateToken();
//   return redirect('/');
// })->name('logout.internal');
  
Route::post('/internal-logout', function (Request $request) {
  Auth::guard('internal')->logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();

  return redirect('/');

})->name('internal.logout');


// Route::post('/logout', function (Request $request) {
//   if (Auth::guard('internal')->check()) {
//       Auth::guard('internal')->logout();
//   } elseif (Auth::guard('web')->check()) {
//       Auth::guard('web')->logout();
//   }

//   $request->session()->invalidate();
//   $request->session()->regenerateToken();

//   return redirect('/');
// })->name('logout');

// // Redirect setelah login berdasarkan role
// Route::middleware(['auth'])->group(function () {
//   Route::get('/dashboard', function () {
//       return redirect()->route('home'); // Semua user diarahkan ke home
//   })->name('dashboard');
// });

Route::middleware(['auth'])->group(function () {
  Route::get('/home', function () {
      return view('user.home'); // Pastikan ini mengarah ke halaman home yang benar
  })->name('home');
});


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
    ->middleware(['auth:web,internal'])
    ->name('status');

Route::middleware('auth:web,internal')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
