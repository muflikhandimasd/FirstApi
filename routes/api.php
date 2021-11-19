<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\DoaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// akses class authcontroller, method registrasi

// cara pertama
// Route::post('/register', [AuthController::class, 'registrasi']);

// cara kedua lgsg error untuk semua 
Route::post('/register', [AuthController::class, 'daftar']);
Route::post('/login', [AuthController::class, 'login']);
Route::put('/edit/{user_id}', [AuthController::class, 'editProfile']);

// Change password
Route::put('/change-password/{id}', [AuthController::class, 'changePassword']);

// CRUD Resto dan menunya
Route::post('/add/resto-and-menu', [RestaurantController::class, 'createRestoMenu']);

// get Resto
Route::get('/resto/{id}', [RestaurantController::class, 'getRestoMenu']);

// add 1 menu
Route::post('/add/menu/{resto_id}', [RestaurantController::class, 'addMenu']);

// Edit Resto saja
Route::put('/edit/resto/{resto_id}', [RestaurantController::class, 'editResto']);

// Update Menu
Route::put('/update/menu/{resto_id}/{menu_id}', [RestaurantController::class, 'updateMenu']);

// update resto dan menu dalam bentuk array
Route::put('/update/resto-dan-menu/{resto_id}', [RestaurantController::class, 'editRestoMenu']);

// Get Semua Menu
Route::get('/menu', [RestaurantController::class, 'getAllMenu']);

// Get semua resto
Route::get('/resto', [RestaurantController::class, 'getAllResto']);

// Cari menu
Route::get('/cari', [RestaurantController::class, 'cari']);

// Delete menu
Route::delete('/hapus/menu/{resto_id}/{menu_id}', [RestaurantController::class, 'hapusMenuPadaResto']);