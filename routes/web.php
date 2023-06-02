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

Route::get('/user', [UserController::class, 'index']);

Route::get('/cabor', [CaborController::class, 'index']);

Route::get('/kecamatan', [KecamatanController::class, 'index']);

Route::get('/peserta', [PesertaController::class, 'index']);

Route::get('/event', [EventController::class, 'index']);
