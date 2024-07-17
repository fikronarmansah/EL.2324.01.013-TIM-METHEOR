<?php

use App\Http\Controllers\API\LogController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'render'])->name('home');
    Route::get('/concept', [ConceptController::class, 'render'])->name('concept');
    Route::get('/history', [HistoryController::class, 'render'])->name('history');
    // Route::get('/users', [UserController::class, 'render'])->name('users');

    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login-form');

    Route::get('/register', [RegisterController::class, 'index'])->name("register");
    Route::post('/register', [RegisterController::class, 'store'])->name("register-form");
});

Route::get('/api/alerts', [LogController::class, 'getLogs']);
Route::post('/api/alerts/{id}/update', [LogController::class, 'updateActive']);
Route::post('/api/deleteAllNotifications', [LogController::class, 'deleteAllNotifications']);
