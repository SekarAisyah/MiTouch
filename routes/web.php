<?php

use App\Http\Controllers\AdmpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrapelatihanController;
use App\Http\Controllers\PascapelatihanController;
use App\Http\Controllers\PraadmpController;
use App\Http\Controllers\PracoachingController;
use App\Http\Controllers\KompetensiController;

Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/', [UserController::class, 'loginku']);

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/user/create', [UserController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard/dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/report-pelatihan', function () {
        return view('report/report_pelatihan');
    });

    //=============================================== USER ===============================================
    Route::get('/user', [UserController::class, 'index'])->name('get.user');
    Route::post('/user/create', [UserController::class, 'register'])->name('get.user');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('delete.user');
    Route::get('/user/get/{id}', [UserController::class, 'getEdit'])->name('edit.user');
    Route::post('/user/myedit/{id}', [UserController::class, 'edit'])->name('get.user');

    //=============================================== PROFILE ===============================================
    Route::get('/profile', [UserController::class, 'profile'])->name('get.profile');
    Route::post('/profile/create', [UserController::class, 'register'])->name('get.pelatihan');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('delete.user');
    Route::get('/user/get/{id}', [UserController::class, 'getEdit'])->name('edit.user');
    Route::post('/profile/myedit/{id}', [UserController::class, 'editprofile'])->name('get.user');

    Route::prefix('profile')->group(function () {
        Route::get('/changepassword', [UserController::class, 'showChangePasswordForm'])->name('profile.changepassword');
        Route::post('/changepassword', [UserController::class, 'changePassword']);
    });

    //=============================================== PELATIHAN ===============================================
    Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('get.pelatihan');
    Route::post('/pelatihan/create', [PelatihanController::class, 'create'])->name('get.pelatihan');
    Route::get('/pelatihan/get/{id}', [PelatihanController::class, 'getEdit'])->name('edit.pelatihan');
    Route::put('/pelatihan/myedit/{id}', [PelatihanController::class, 'edit'])->name('get.pelatihan');
    Route::post('/pelatihan/send-data', [PelatihanController::class, 'send'])->name('send.pelatihan');
    Route::post('/pelatihan/exportoword/{id}', [PelatihanController::class, 'exportToWord'])->name('export.pelatihan');
    Route::post('/pelatihan/revisi', [PelatihanController::class, 'revisi'])->name('revisi.pelatihan');
    Route::post('/pelatihan/reject', [PelatihanController::class, 'reject'])->name('reject.pelatihan');
    Route::post('/pelatihan/delete', [PelatihanController::class, 'delete'])->name('delete.pelatihan');
    Route::post('/pelatihan/get_user_info', [PelatihanController::class, 'getUserInfo'])->name('get_user_info.pelatihan');
    Route::get('/pelatihan/get_user', [PelatihanController::class, 'getUser'])->name('get.user.pelatihan');
    Route::get('/pelatihan_pdf', [PelatihanController::class, 'exportPDF'])->name('cetak.pelatihan');

    Route::get('/report-pelatihan', [PelatihanController::class, 'report'])->name('report.pelatihan');
    Route::post('/report-pelatihan/search', [PelatihanController::class, 'report']);
    //=============================================== PRAPELATIHAN ===============================================
    Route::get('/prapelatihan', [PrapelatihanController::class, 'index'])->name('get.prapelatihan');
    Route::post('/prapelatihan/create', [PrapelatihanController::class, 'create'])->name('get.prapelatihan');
    Route::get('/prapelatihan/get/{id}', [PrapelatihanController::class, 'getEdit'])->name('edit.prapelatihan');
    Route::put('/prapelatihan/myedit/{id}', [PrapelatihanController::class, 'edit'])->name('get.prapelatihan');
    Route::post('/prapelatihan/get_user_info', [PrapelatihanController::class, 'getUserInfo'])->name('get_user_info.prapelatihan');
    Route::get('/prapelatihan/get_user', [PrapelatihanController::class, 'getUser'])->name('get.user.prapelatihan');
    Route::post('/prapelatihan/delete', [PrapelatihanController::class, 'delete'])->name('delete.prapelatihan');
    //=============================================== PascaPELATIHAN ===============================================
    Route::get('/pascapelatihan', [PascapelatihanController::class, 'index'])->name('get.pascapelatihan');
    Route::post('/pascapelatihan/create', [PascapelatihanController::class, 'create'])->name('get.pascapelatihan');
    Route::get('/pascapelatihan/get/{id}', [PascapelatihanController::class, 'getEdit'])->name('edit.pascapelatihan');
    Route::put('/pascapelatihan/myedit/{id}', [PascapelatihanController::class, 'edit'])->name('get.pascapelatihan');
    Route::post('/pascapelatihan/get_user_info', [PascapelatihanController::class, 'getUserInfo'])->name('get_user_info.pascapelatihan');
    Route::get('/pascapelatihan/get_user', [PascapelatihanController::class, 'getUser'])->name('get.user.pascapelatihan');
    Route::post('/pascapelatihan/delete', [PascapelatihanController::class, 'delete'])->name('delete.pascapelatihan');


    //=============================================== COACHING ===============================================
    Route::get('/coaching', [CoachingController::class, 'index'])->name('get.coaching');
    Route::post('/coaching/create', [CoachingController::class, 'create'])->name('get.coaching');
    Route::get('/coaching/get/{id}', [CoachingController::class, 'getEdit'])->name('edit.coaching');
    Route::put('/coaching/myedit/{id}', [CoachingController::class, 'edit'])->name('get.coaching');
    Route::post('/coaching/send-data', [CoachingController::class, 'send'])->name('send.coaching');
    Route::post('/coaching/exporttoword/{id}', [CoachingController::class, 'exportToWord'])->name('export.coaching');
    Route::post('/coaching/revisi', [CoachingController::class, 'revisi'])->name('revisi.coaching');
    Route::post('/coaching/reject', [CoachingController::class, 'reject'])->name('reject.coaching');
    Route::post('/coaching/delete', [CoachingController::class, 'delete'])->name('delete.coaching');
    Route::post('/coaching/get_user_info', [CoachingController::class, 'getUserInfo'])->name('get_user_info.coaching');
    Route::post('/coaching/get_kompetensi_info', [CoachingController::class, 'getKompetensiInfo'])->name('get_kompetensi_info.coaching');
    Route::get('/coaching/get_user', [CoachingController::class, 'getUser'])->name('get.user.coaching');
    Route::get('/coaching_pdf', [CoachingController::class, 'exportPDF']);

    Route::get('/report-coaching', [CoachingController::class, 'report'])->name('report.coaching');
    Route::post('/report-coaching/search', [CoachingController::class, 'report']);

    //=============================================== PRA COACHING===============================================
    Route::get('/pracoaching', [PracoachingController::class, 'index'])->name('get.pracoaching');
    Route::post('/pracoaching/create', [PracoachingController::class, 'create'])->name('get.pracoaching');
    Route::get('/pracoaching/get/{id}', [PracoachingController::class, 'getEdit'])->name('edit.pracoaching');
    Route::put('/pracoaching/myedit/{id}', [PracoachingController::class, 'edit'])->name('get.pracoaching');
    Route::post('/pracoaching/get_user_info', [PracoachingController::class, 'getUserInfo'])->name('get_user_info.pracoaching');
    Route::get('/pracoaching/get_user', [PracoachingController::class, 'getUser'])->name('get.user.pracoaching');
    Route::post('/pracoaching/delete', [PracoachingController::class, 'delete'])->name('delete.pracoaching');


    //=============================================== ADMP ===============================================
    Route::get('/admp', [AdmpController::class, 'index'])->name('get.admp');
    Route::post('/admp/create', [AdmpController::class, 'create'])->name('get.admp');
    Route::get('/admp/get/{id}', [AdmpController::class, 'getEdit'])->name('edit.admp');
    Route::put('/admp/myedit/{id}', [AdmpController::class, 'edit'])->name('get.admp');
    Route::post('/admp/send-data', [AdmpController::class, 'send'])->name('send.admp');
    Route::post('/admp/exporttoword/{id}', [AdmpController::class, 'exportToWord'])->name('export.admp');
    Route::post('/admp/revisi', [AdmpController::class, 'revisi'])->name('revisi.admp');
    Route::post('/admp/reject', [AdmpController::class, 'reject'])->name('reject.admp');
    Route::post('/admp/delete', [AdmpController::class, 'delete'])->name('delete.admp');
    Route::post('/admp/get_user_info', [AdmpController::class, 'getUserInfo'])->name('get_user_info.admp');
    Route::get('/admp/get_user', [AdmpController::class, 'getUser'])->name('get.user.admp');
    Route::get('/admp_pdf', [AdmpController::class, 'exportPDF']);

    Route::get('/report-admp', [AdmpController::class, 'report'])->name('report.Admp');
    Route::post('/report-admp/search', [PelatihanController::class, 'report']);

    //=============================================== PRA ADMP ===============================================
    Route::get('/praadmp', [PraadmpController::class, 'index'])->name('get.praadmp');
    Route::post('/praadmp/create', [PraadmpController::class, 'create'])->name('get.praadmp');
    Route::get('/praadmp/get/{id}', [PraadmpController::class, 'getEdit'])->name('edit.praadmp');
    Route::put('/praadmp/myedit/{id}', [PraadmpController::class, 'edit'])->name('get.praadmp');
    Route::post('/praadmp/get_user_info', [PraadmpController::class, 'getUserInfo'])->name('get_user_info.praadmp');
    Route::get('/praadmp/get_user', [PraadmpController::class, 'getUser'])->name('get.user.praadmp');
    Route::post('/praadmp/delete', [PraadmpController::class, 'delete'])->name('delete.praadmp');

    //=============================================== Kompetensi ===============================================
    Route::get('/kompetensi', [KompetensiController::class, 'index'])->name('get.kompetensi');
    Route::post('/kompetensi/create', [KompetensiController::class, 'create'])->name('get.kompetensi');
    Route::post('/kompetensi/delete', [KompetensiController::class, 'delete'])->name('delete.kompetensi');
    Route::get('/kompetensi/get/{id}', [KompetensiController::class, 'getEdit'])->name('edit.kompetensi');
    Route::post('/kompetensi/myedit/{id}', [KompetensiController::class, 'edit'])->name('get.kompetensi');
});
