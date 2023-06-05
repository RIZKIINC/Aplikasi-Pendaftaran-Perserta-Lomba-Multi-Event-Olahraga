<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaborController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\EventController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// route user
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'destroy']);

 muy
//Cabang olahraga
Route::get('/cabor', [CaborController::class, 'index']);
Route::get('/cabor/create', [CaborController::class, 'create']);
Route::POST('/cabor/store', [CaborController::class, 'store']);
Route::get('/cabor/edit/{id}', [CaborController::class, 'edit']);
Route::post('/cabor/{id}', [CaborController::class, 'update']);
Route::get('/cabor/delete/{id}', [CaborController::class, 'destroy']);

Route::get('/cabor', [CaborController::class, 'index']);
 main

// route kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index']);

// route peserta
Route::get('/peserta', [PesertaController::class, 'index']);

// route event
Route::get('/event', [EventController::class, 'index']);
Route::get('/event', [EventController::class, 'create']);

// route peserta
Route::resource('peserta', PesertaController::class);
