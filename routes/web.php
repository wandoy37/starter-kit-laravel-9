<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->middleware('auth')->group(function () {
    // Dashboard Insight
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.dashboard');

    // Users Manage
    Route::get('/pengguna', [UserController::class, 'index'])->name('auth.user');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('auth.user.create');
    Route::post('/pengguna/store', [UserController::class, 'store'])->name('auth.user.store');
    Route::get('/pengguna/{username}/edit', [UserController::class, 'edit'])->name('auth.user.edit');
    Route::patch('/pengguna/{username}/update', [UserController::class, 'update'])->name('auth.user.update');
    Route::delete('/pengguna/{username}/delete', [UserController::class, 'destroy'])->name('auth.user.delete');
});
