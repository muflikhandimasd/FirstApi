<?php

use App\Http\Controllers\DoaController;
use App\Http\Controllers\WisataController;
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

Route::get('/', [WisataController::class, 'wisata'])->name('wisata');

// Route::get('/', [DoaController::class, 'doa'])->name('doa');
Route::get('/post-data', [DoaController::class, 'postData'])->name('post');
Route::get('/kategori', [DoaController::class, 'kategori'])->name('kategori');
Route::post('/posting', [DoaController::class, 'posting'])->name('posting');
Route::post('/add-kategori', [DoaController::class, 'addkategori'])->name('addkategori');