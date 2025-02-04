<?php


use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\InterestController;
use App\Http\Controllers\backend\PackageFeatureController;
use App\Http\Controllers\backend\PackageController;
use App\Http\Controllers\backend\UserlistController;
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

Route::get('email/verify', function () {
    return view('auth.verify'); // This is where the user will be asked to verify their email
})->middleware('auth')->name('verification.notice');

Route::get('email/verify/{id}/{hash}', function ($id, $hash) {
    $user = App\Models\User::find($id);

    if (hash_equals($hash, sha1($user->getEmailForVerification()))) {
        $user->markEmailAsVerified();
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect()->route('admin.login');
    }

    return redirect()->route('admin.login');
})->middleware(['auth', 'signed'])->name('verification.verify');

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

