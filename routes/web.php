<?php


use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\CustomPasswordResetController;
use Illuminate\Support\Facades\Route;


// Backend

Route::get('new-password/{token}', [CustomPasswordResetController::class, 'showResetForm'])->name('new.password');
Route::post('new-password', [CustomPasswordResetController::class, 'resetPassword'])->name('new.password');

Route::get('admin/register', [AuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [AuthController::class, 'register'])->name('admin.register');

// Password Reset Routes
Route::get('admin/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/password/reset', [AuthController::class, 'reset'])->name('admin.password.update');

Route::get('email-verification/notice', [VerificationController::class, 'showVerificationNotice'])->name('email-verification.notice');
Route::get('email/verify/{token}', [VerificationController::class, 'verify'])->name('email.verify');

Route::get('/', function () {
	return to_route('admin.login.form');
});

Route::get('admin/login', [AuthController::class, 'loginForm'])->name('admin.login.form');
Route::post('admin-login', [AuthController::class, 'login'])->name('admin.login');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});

require __DIR__.'/auth.php';

