<?php


use App\Http\Controllers\backend\AdminAuthController;
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

Route::get('admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [AdminAuthController::class, 'register'])->name('admin.register');

// Password Reset Routes
Route::get('admin/password/reset', [AdminAuthController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/email', [AdminAuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset/{token}', [AdminAuthController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/password/reset', [AdminAuthController::class, 'reset'])->name('admin.password.update');

Route::get('/', function () {
	return to_route('admin.login.form');
});

Route::get('admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login.form');
Route::post('admin-login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/user-lists', [UserlistController::class, 'index'])->name('user.index');
    Route::delete('/user-delete/{id}', [UserlistController::class, 'delete'])->name('user.delete');

    Route::resource('interests', InterestController::class);

    //package
    Route::prefix('packages')->group(function () {
        Route::get('/list', [PackageController::class, 'index'])->name('admin.packages.list');
        Route::post('/store', [PackageController::class, 'store'])->name('admin.packages.store');
        Route::post('/update/{id}', [PackageController::class, 'update'])->name('admin.packages.update');
        Route::get('/status/{id}', [PackageController::class, 'status'])->name('admin.packages.status');
        Route::delete('/{id}', [PackageController::class, 'destroy'])->name('admin.packages.destroy');
        Route::get('/membership-list', [PackageController::class, 'memberShipList'])->name('admin.packages.membership-list');
        Route::prefix('/feature')->group(function () {
            Route::get('/list/{id}', [PackageFeatureController::class, 'list'])->name('admin.packages.feature.list');
            Route::post('/store', [PackageFeatureController::class, 'store'])->name('admin.packages.feature.store');
            Route::post('/update/{id}', [PackageFeatureController::class, 'update'])->name('admin.packages.feature.update');
            Route::get('/status/{id}', [PackageFeatureController::class, 'status'])->name('admin.packages.feature.status');
            Route::delete('/{id}', [PackageFeatureController::class, 'destroy'])->name('admin.packages.feature.destroy');
        });
        Route::prefix('/sales')->group(function () {
            Route::get('/', [PackageController::class, 'salesIndex'])->name('admin.packages.sales');
        });
    });

});

//user block
Route::get('block-confirm/{sender_identifier}/{receiver_identifier}', [UserlistController::class, 'blockConfirm'])->name('block.confirm');
Route::post('user-block/{sender_identifier}/{receiver_identifier}', [UserlistController::class, 'userBlock'])->name('user.block');

require __DIR__.'/auth.php';

