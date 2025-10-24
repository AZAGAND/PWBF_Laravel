<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', function () {
    return view('site.home');
    
});

route::get('/login', [AuthController::class, 'login'])->name('login');


route::get('/roles/admin/dashboard', [DashboardController::class, 'Dashboard'])->name('roles.admin.dashboard');
route::get('/roles/admin/data_master', [DashboardController::class, 'DataMaster'])->name('roles.admin.data_master');
route::get('/roles/admin/views/data_user', [UserController::class, 'DataUser'])->name('roles.admin.views.data_user');
route::get('/roles/admin/views/data_role', [RoleController::class, 'DataRole'])->name('roles.admin.views.data_role');


Route::get('/home', [SiteController::class, 'index'])->name('site.home');
route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('site.visi-misi');
route::get('/struktur-Organisasi', [SiteController::class, 'struktur'])->name('struktur_organisasi');

