<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CamatController;
use App\Http\Controllers\SubDistrictProfileController;
use App\Http\Controllers\MapDistrictSportController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ContactPeopleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\VerifikasiPendaftaranController;

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

Route::get('/mapdistrictsport/create/partisipan', function () {
    return view('user.pendaftaran.pendaftaranpartisipan2');
});

Route::get('/mapdistrictsport/create/test2', function () {
    return view('user.pendaftaran.test2');
});

Route::get('/mapdistrictsport/create/pendaftaranedit', function () {
    return view('user.pendaftaran.pendaftaranedit');
});
// Route::get('/', function () {
//     return view('layout.mainlayout_u');
// });
Route::get('/pendaftaran', function () {
    return view('user.pendaftaran.pendaftaran');
});
Route::get('/', function () {
    return view('layout.mainlayout_u');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/', [UsersController::class, 'indexLogin'])->name('login');
Route::post('/post_login', [UsersController::class, 'postLogin'])->name('post_login');
Route::get('/register', [UsersController::class, 'preRegister'])->name('register');
Route::post('/post_register', [UsersController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [UsersController::class, 'Logout'])->name('logout');

Route::middleware(['auth', 'CheckRole:1'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'dashboardAdmin']);

    // cabor
    Route::get('/camatlist', [CamatController::class, 'index']);

    // admin
    Route::get('/adminlist', [AdminController::class, 'index']);

    // admin
    Route::get('/participantlist', [ParticipantController::class, 'index2']);

    // sport -> cabor
    Route::get('/sport/index', [SportController::class, 'index']);
    Route::get('/sport/create', [SportController::class, 'create']);
    Route::post('/sport/store', [SportController::class, 'store']);
    Route::get('/sport/show/{sport}', [SportController::class, 'show']);
    Route::get('/sport/edit/{sport}', [SportController::class, 'edit']);
    Route::post('/sport/update/{sport}', [SportController::class, 'update']);
    Route::get('/sport/delete/{sport}', [SportController::class, 'destroy']);

    //verifikasipendaftaran
    Route::get('/verifkasi-pendaftaran/index', [VerifikasiPendaftaranController::class, 'index']);
    Route::get('/detail-pendaftaran/{id}', [VerifikasiPendaftaranController::class, 'indexDetail']);
    Route::post('/verif/{id}', [VerifikasiPendaftaranController::class, 'VerifikasiPendaftaran']);

});

Route::middleware(['auth', 'CheckRole:3'])->group(function () {//haitotttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
    Route::get('/dashboard/camat', [DashboardController::class, 'camatCount']);
    
    Route::get('/subprofil/editsubprofil/{id}', [SubDistrictProfileController::class, 'indexupdateSubProfile'])->name('subprofil');

    Route::get('/camat', function () {
        return view('dashboard.camat');
    });
    Route::get('/subprofil/editsubprofil', [SubDistrictProfileController::class, 'indexupdateSubProfile']);
    Route::post('/subprofil/updateSubProfile', [SubDistrictProfileController::class, 'updateSubProfile']);
    Route::post('/subprofil/updatecontactpeople', [SubDistrictProfileController::class, 'updateContactPeople']);

    // mapdistrictsport -> mapdistrictsport
    Route::get('/mapdistrictsport/index', [MapDistrictSportController::class, 'index']);
    Route::get('/mapdistrictsport/create', [MapDistrictSportController::class, 'create']);
    Route::post('/mapdistrictsport/store', [MapDistrictSportController::class, 'store']);
    Route::get('/mapdistrictsport/show/{id}', [MapDistrictSportController::class, 'show']);
    Route::get('/mapdistrictsport/edit/{id}', [MapDistrictSportController::class, 'edit']);
    Route::post('/mapdistrictsport/update/{id}', [MapDistrictSportController::class, 'update']);
    Route::get('/mapdistrictsport/delete/{id}', [MapDistrictSportController::class, 'destroy']);

    // participants -> participant
    Route::get('/participant/index/{id}', [ParticipantController::class, 'index']);
    Route::get('/participant/create/{id}', [ParticipantController::class, 'create']);
    Route::post('/participant/store/{id}', [ParticipantController::class, 'store']);
    Route::get('/participant/show/{id}', [ParticipantController::class, 'show']);
    Route::get('/participant/edit/{id}', [ParticipantController::class, 'edit']);
    Route::post('/participant/update/{id}', [ParticipantController::class, 'update']);
    Route::get('/participant/delete/{id}', [ParticipantController::class, 'destroy']);
});
