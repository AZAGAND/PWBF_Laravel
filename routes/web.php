<?php

use App\Http\Controllers\Dokter\DokterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Ras_HewanController;
use App\Http\Controllers\Admin\Jenis_HewanController;
use App\Http\Controllers\Admin\DataPemilikController;
use App\Http\Controllers\Admin\Data_DokterController;
use App\Http\Controllers\Admin\Data_HewanController;
use App\Http\Controllers\Admin\Data_KategoriController;
use App\Http\Controllers\Admin\Kategori_KlinisController;
use App\Http\Controllers\Admin\Kode_tindakan_terapiController;
use app\Http\Controllers\Resepsionis\ResepsionisController;
use app\Http\Controllers\Perawat\PerawatController;
use app\Http\Controllers\Pemilik\PemilikController;


Route::get('/', function () {
    return view('site.home');
    
});

Route::get('/home', [SiteController::class, 'index'])->name('site.home');
route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('site.visi-misi');
route::get('/struktur-Organisasi', [SiteController::class, 'struktur'])->name('struktur_organisasi');


Auth::routes();
route::middleware('isAdministrator')->group(function() {
    route::get('dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard_Admin');
    route::get('data_master', [DashboardController::class, 'DataMaster'])->name('roles.admin.data_master');
    route::get('data_user', [UserController::class, 'DataUser'])->name('roles.admin.views.data_user');
    route::get('data_role', [RoleController::class, 'DataRole'])->name('roles.admin.views.data_role');
    route::get('ras_hewan', [Ras_HewanController::class, 'DataRasHewan'])->name('roles.admin.views.ras_hewan');
    route::get('jenis_hewan', [Jenis_HewanController::class, 'DataJenisHewan'])->name('roles.admin.views.jenis_hewan');
    route::get('data_pemilik', [DataPemilikController::class, 'DataPemilik'])->name('roles.admin.views.data_pemilik');
    route::get('data_dokter', [Data_DokterController::class, 'DataDokter'])->name('roles.admin.views.data_dokter');
    route::get('data_hewan', [Data_HewanController::class, 'DataHewan'])->name('roles.admin.views.data_hewan');
    route::get('data_kategori', [Data_KategoriController::class, 'DataKategori'])->name('roles.admin.views.data_kategori');
    route::get('data_kategori_klinis', [Kategori_KlinisController::class, 'DataKategoriKlinis'])->name('roles.admin.views.data_kategori_klinis');
    route::get('data_kode_tindakan_terapi', [Kode_tindakan_terapiController::class, 'DataKodeTindakanTerapi'])->name('roles.admin.views.data_kode_tindakan_terapi');
});

route::middleware('isResepsionis')->group(function() {
    route::get('Dashboard_Resepsionis', [ResepsionisController::class, 'Dashboard_Resepsionis'])->name('Dashboard_Resepsionis');
});

route::middleware('isDokter')->group(function() {
    route::get('Dashboard_Dokter', [DokterController::class, 'Dashboard_Dokter'])->name('Dashboard_Dokter');
});

route::middleware('isPerawat')->group(function() {
    route::get('Dashboard_Perawat', [PerawatController::class, 'Dashboard_Perawat'])->name('Dashboard_Perawat');
});

route::middleware('isPemilik')->group(function() {
    route::get('Dashboard_Pemilik', [PemilikController::class, 'Dashboadr_Pemilik'])->name('Dashboard_Pemilik');
});