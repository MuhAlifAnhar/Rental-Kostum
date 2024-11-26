<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\RequestController;

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
Route::get('/admin', [SuperController::class, 'indexe'])->middleware('auth');
Route::resource('/admin/toko', TokoController::class)->middleware('auth');
Route::resource('/admin/request', RequestController::class)->middleware('auth');
Route::resource('/admin/produk', BajuController::class)->middleware('auth');

Route::get('/', [UserController::class, 'index'])->middleware('guest');
Route::post('/login', [UserController::class, 'logine']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', [UserController::class, 'index'])->middleware('guest');

Route::get('/kostum', [UserController::class, 'kostum'])->middleware('guest');
Route::get('/kostum/{tokoId}', [UserController::class, 'kostum'])->name('kostum.byToko')->middleware('guest');
Route::post('/kostum', [UserController::class, 'kostum'])->middleware('guest');
Route::post('/kostum/update-status', [UserController::class, 'updateStatus'])->name('kostum.updateStatus');

Route::get('/kontak', [UserController::class, 'kontak'])->middleware('guest');

Route::post('/kontak', [FormController::class, 'kontak'])->middleware('guest');

Route::get('/syarat', [UserController::class, 'syarat'])->middleware('guest');

Route::get('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'registrasi'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);
