<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [LinkController::class, 'index'])->name('links.index');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
});

Route::get('/{shortCode}', [LinkController::class, 'show'])->name('links.show');