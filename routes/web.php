<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;

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
Route::get('/', [UserController::class, 'index'])->middleware('guest');
Route::get('/dashboard', [UserController::class, 'index'])->middleware('guest');
Route::get('/kostum', [UserController::class, 'kostum'])->middleware('guest');
Route::get('/kontak', [UserController::class, 'kontak'])->middleware('guest');
Route::get('/syarat', [UserController::class, 'syarat'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/kontak', [FormController::class, 'kontak'])->middleware('guest');
Route::get('/register', [UserController::class, 'registrasi'])->middleware('guest');
