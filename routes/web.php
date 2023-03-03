<?php

use App\Http\Controllers\ClaimKeyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MyKeysController;
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

    # Todo change route link
    Route::get('/library', LibraryController::class)->name('library');

    Route::post('/keys/{key}/claim', ClaimKeyController::class)->name('keys.claim');
});
