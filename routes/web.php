
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

// Route logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('books', BookController::class)
        ->parameters(['books' => 'id']);

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/members', [MemberController::class, 'index'])
        ->name('members.index');

    // Route khusus Admin
    Route::resource('users', UserController::class)
        ->middleware('can:manage-users');
});
