<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [AuthController::class, 'index'])->name('signin')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->name('signup')->middleware('guest');
Route::post('/registrasi', [AuthController::class, 'regis'])->name('register')->middleware('guest');

Route::middleware(['auth'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
  Route::resource('product', ProductController::class);
  Route::resource('transaction', TransactionController::class);
  Route::get('/transaction/change-status/{id}', [TransactionController::class, 'action_done']);
  Route::get('/generate_pdf', [TransactionController::class, 'generate_pdf'])->name('generate');
});