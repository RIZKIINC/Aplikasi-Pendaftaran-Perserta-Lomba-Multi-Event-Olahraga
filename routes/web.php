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
use App\Http\Controllers\EventController;
use App\Http\Controllers\KetupelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VerifikasiPendaftaranController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/login', [UsersController::class, 'indexLogin'])->name('login');
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

    // event
    Route::get('/event/index', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/show/{event}', [EventController::class, 'show'])->name('event.show');
    Route::get('/event/edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/event/update/{event}', [EventController::class, 'update'])->name('event.update');
    Route::get('/event/delete/{event}', [EventController::class, 'destroy'])->name('event.destroy');

    // news
    Route::get('/news/index', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/show/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/news/delete/{news}', [NewsController::class, 'destroy'])->name('news.destroy');


    // news
    Route::get('/team/index', [TeamController::class, 'index'])->name('team.index');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/show/{team}', [TeamController::class, 'show'])->name('team.show');
    Route::get('/team/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('/team/update/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::get('/team/delete/{team}', [TeamController::class, 'destroy'])->name('team.destroy');

    // CRUD USER
    Route::get('/user', [UsersController::class, 'indexUser']);
    Route::get('/user/create', [UsersController::class, 'indexCreateuser']);
    Route::post('/user/store', [UsersController::class, 'CreateUser']);
    Route::get('/user/edit/{user}', [UsersController::class, 'editUser']);
    Route::post('/user/update/{user}', [UsersController::class, 'updateUser']);
    Route::get('/user/delete/{user}', [UsersController::class, 'destroy']);

    //verifikasipendaftaran
    Route::get('/verifkasi-pendaftaran/index', [VerifikasiPendaftaranController::class, 'index']);
    Route::get('/detail-pendaftaran/{id}', [VerifikasiPendaftaranController::class, 'indexDetail']);
    Route::post('/verif/{id}', [VerifikasiPendaftaranController::class, 'VerifikasiPendaftaran']);
});

Route::middleware(['auth', 'CheckRole:3'])->group(function () { //haitotttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
    Route::get('/dashboard/camat', [DashboardController::class, 'camatCount']);

    Route::get('/subprofil/editsubprofil/', [SubDistrictProfileController::class, 'indexupdateSubProfile'])->name('subprofil');

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
    Route::get('/participant/print-id-card/{id}', [ParticipantController::class, 'printIdCard'])->name('participant.print-id-card');
});

Route::middleware(['auth', 'CheckRole:2'])->group(function () {
    Route::get('/dashboard/ketupel', [KetupelController::class, 'index']);
    Route::get('/ketupel/detail/{id}', [KetupelController::class, 'show']);
    Route::get('/detail/cetak_pdf/{id}', [KetupelController::class, 'print'])->name('print.pdf');
    Route::get('/cetak_pdf/peserta/{id}', [KetupelController::class, 'print_peserta'])->name('cetak_peserta');
    Route::get('/ketupel/show_peserta/{id}', [KetupelController::class, 'show_peserta']);
});


