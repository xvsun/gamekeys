<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', DashboardController::class);
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('games', GameController::class)
        ->only(['index', 'show']);
});
