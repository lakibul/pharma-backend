<?php


use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\CustomPasswordResetController;
use Illuminate\Support\Facades\Route;


// Backend

Route::get('new-password/{token}', [CustomPasswordResetController::class, 'showResetForm'])->name('new.password');
Route::post('new-password', [CustomPasswordResetController::class, 'resetPassword'])->name('new.password');

Route::get('user/register', [AuthController::class, 'showRegistrationForm'])->name('user.register');
Route::post('user/register', [AuthController::class, 'register'])->name('user.register');

// Password Reset Routes
Route::get('user/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('user/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('user.password.email');
Route::get('user/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('user.password.reset');
Route::post('user/password/reset', [AuthController::class, 'reset'])->name('user.password.update');

Route::get('email-verification/notice', [VerificationController::class, 'showVerificationNotice'])->name('email-verification.notice');
Route::get('email/verify/{id}/{token}', [VerificationController::class, 'verify'])->name('email.verify');

Route::get('/', function () {
	return to_route('user.login.form');
});

Route::get('user/login', [AuthController::class, 'loginForm'])->name('user.login.form');
Route::post('user-login', [AuthController::class, 'login'])->name('user.login');

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('user.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('user.logout');

});

require __DIR__.'/auth.php';

