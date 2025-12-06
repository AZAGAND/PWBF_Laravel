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
use App\Http\Controllers\Resepsionis\ResepsionisController;
use App\Http\Controllers\Perawat\PerawatController;
use App\Http\Controllers\Pemilik\PemilikController;


Route::get('/', function () {
    return view('site.home');
    
});

Route::get('/home', [SiteController::class, 'index'])->name('site.home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('site.visi-misi');
Route::get('/struktur-Organisasi', [SiteController::class, 'struktur'])->name('struktur_organisasi');


Auth::routes();
route::middleware('isAdministrator')->group(function() {
    route::get('dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard_Admin');
    route::get('data_master', [DashboardController::class, 'DataMaster'])->name('data_master');
    route::get('data_user', [UserController::class, 'DataUser'])->name('data_user');
    route::get('users/create', [UserController::class, 'create'])->name('users.create');
    route::post('users', [UserController::class, 'store'])->name('users.store');
    route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    route::get('users/{user}/password', [UserController::class, 'password'])->name('users.password');
    route::put('users/{user}/password', [UserController::class, 'updatePassword'])->name('users.update_password');
    // Role Management
    route::get('data_role', [RoleController::class, 'DataRole'])->name('data_role');
    route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
    route::patch('roles/{id}/toggle', [RoleController::class, 'toggleStatus'])->name('roles.toggle');
    route::get('ras_hewan', [Ras_HewanController::class, 'DataRasHewan'])->name('ras_hewan');
    route::get('ras_hewan/create', [Ras_HewanController::class, 'create'])->name('ras.create');
    route::post('ras_hewan', [Ras_HewanController::class, 'store'])->name('ras.store');
    route::get('ras_hewan/{id}/edit', [Ras_HewanController::class, 'edit'])->name('ras.edit');
    route::put('ras_hewan/{id}', [Ras_HewanController::class, 'update'])->name('ras.update');
    route::delete('ras_hewan/{id}', [Ras_HewanController::class, 'destroy'])->name('ras.destroy');
    route::get('jenis_hewan', [Jenis_HewanController::class, 'DataJenisHewan'])->name('jenis_hewan');
    route::get('jenis_hewan/create', [Jenis_HewanController::class, 'create'])->name('jenis.create');
    route::post('jenis_hewan', [Jenis_HewanController::class, 'store'])->name('jenis.store');
    route::get('jenis_hewan/{id}/edit', [Jenis_HewanController::class, 'edit'])->name('jenis.edit');
    route::put('jenis_hewan/{id}', [Jenis_HewanController::class, 'update'])->name('jenis.update');
    route::delete('jenis_hewan/{id}', [Jenis_HewanController::class, 'destroy'])->name('jenis.destroy');
    route::get('data_pemilik', [DataPemilikController::class, 'DataPemilik'])->name('data_pemilik');
    route::get('data_pemilik/create', [DataPemilikController::class, 'create'])->name('pemilik.create');
    route::post('data_pemilik', [DataPemilikController::class, 'store'])->name('pemilik.store');
    route::get('data_pemilik/{id}/edit', [DataPemilikController::class, 'edit'])->name('pemilik.edit');
    route::put('data_pemilik/{id}', [DataPemilikController::class, 'update'])->name('pemilik.update');
    route::delete('data_pemilik/{id}', [DataPemilikController::class, 'destroy'])->name('pemilik.destroy');
    route::get('data_dokter', [Data_DokterController::class, 'DataDokter'])->name('data_dokter');
    route::get('data_dokter/create', [Data_DokterController::class, 'create'])->name('dokter.create');
    route::post('data_dokter', [Data_DokterController::class, 'store'])->name('dokter.store');
    route::get('data_dokter/{id}/edit', [Data_DokterController::class, 'edit'])->name('dokter.edit');
    route::put('data_dokter/{id}', [Data_DokterController::class, 'update'])->name('dokter.update');
    route::get('data_dokter/{id}/edit', [Data_DokterController::class, 'edit'])->name('dokter.edit');
    route::put('data_dokter/{id}', [Data_DokterController::class, 'update'])->name('dokter.update');
    route::delete('data_dokter/{id}', [Data_DokterController::class, 'destroy'])->name('dokter.destroy');

    route::get('data_hewan', [Data_HewanController::class, 'DataHewan'])->name('data_hewan');
    route::get('data_hewan/create', [Data_HewanController::class, 'create'])->name('hewan.create');
    route::post('data_hewan', [Data_HewanController::class, 'store'])->name('hewan.store');
    route::get('data_hewan/{id}/edit', [Data_HewanController::class, 'edit'])->name('hewan.edit');
    route::put('data_hewan/{id}', [Data_HewanController::class, 'update'])->name('hewan.update');
    route::delete('data_hewan/{id}', [Data_HewanController::class, 'destroy'])->name('hewan.destroy');
    
    route::delete('data_hewan/{id}', [Data_HewanController::class, 'destroy'])->name('hewan.destroy');
    
    route::get('data_kategori', [Data_KategoriController::class, 'DataKategori'])->name('data_kategori');
    route::get('data_kategori/create', [Data_KategoriController::class, 'create'])->name('kategori.create');
    route::post('data_kategori', [Data_KategoriController::class, 'store'])->name('kategori.store');
    route::get('data_kategori/{id}/edit', [Data_KategoriController::class, 'edit'])->name('kategori.edit');
    route::put('data_kategori/{id}', [Data_KategoriController::class, 'update'])->name('kategori.update');
    route::delete('data_kategori/{id}', [Data_KategoriController::class, 'destroy'])->name('kategori.destroy');
    
    route::delete('data_kategori/{id}', [Data_KategoriController::class, 'destroy'])->name('kategori.destroy');
    
    route::get('data_kategori_klinis', [Kategori_KlinisController::class, 'DataKategoriKlinis'])->name('data_kategori_klinis');
    route::get('data_kategori_klinis/create', [Kategori_KlinisController::class, 'create'])->name('kategori_klinis.create');
    route::post('data_kategori_klinis', [Kategori_KlinisController::class, 'store'])->name('kategori_klinis.store');
    route::get('data_kategori_klinis/{id}/edit', [Kategori_KlinisController::class, 'edit'])->name('kategori_klinis.edit');
    route::put('data_kategori_klinis/{id}', [Kategori_KlinisController::class, 'update'])->name('kategori_klinis.update');
    route::delete('data_kategori_klinis/{id}', [Kategori_KlinisController::class, 'destroy'])->name('kategori_klinis.destroy');
    
    route::delete('data_kategori_klinis/{id}', [Kategori_KlinisController::class, 'destroy'])->name('kategori_klinis.destroy');
    
    route::get('data_kode_tindakan_terapi', [Kode_tindakan_terapiController::class, 'DataKodeTindakanTerapi'])->name('data_kode_tindakan_terapi');
    route::get('data_kode_tindakan_terapi/create', [Kode_tindakan_terapiController::class, 'create'])->name('kode_tindakan_terapi.create');
    route::post('data_kode_tindakan_terapi', [Kode_tindakan_terapiController::class, 'store'])->name('kode_tindakan_terapi.store');
    route::get('data_kode_tindakan_terapi/{id}/edit', [Kode_tindakan_terapiController::class, 'edit'])->name('kode_tindakan_terapi.edit');
    route::put('data_kode_tindakan_terapi/{id}', [Kode_tindakan_terapiController::class, 'update'])->name('kode_tindakan_terapi.update');
    route::delete('data_kode_tindakan_terapi/{id}', [Kode_tindakan_terapiController::class, 'destroy'])->name('kode_tindakan_terapi.destroy');

    // Profile
    route::get('profile', [DashboardController::class, 'profile'])->name('admin.profile');
});

route::middleware('isResepsionis')->group(function() {
    route::get('Dashboard_Resepsionis', [ResepsionisController::class, 'Dashboard_Resepsionis'])->name('Dashboard_Resepsionis');
    route::get('resepsionis/profile', [ResepsionisController::class, 'profile'])->name('resepsionis.profile');
});

route::middleware('isDokter')->group(function() {
    route::get('Dashboard_Dokter', [DokterController::class, 'Dashboard_Dokter'])->name('Dashboard_Dokter');
    route::get('dokter/rekam-medis', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'index'])->name('dokter.rekam_medis');
    route::get('dokter/rekam-medis/{id}', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'show'])->name('dokter.rekam_medis.show');
    
    // CRUD Detail Rekam Medis
    route::post('dokter/rekam-medis/detail', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'storeDetail'])->name('dokter.rekam_medis.detail.store');
    route::put('dokter/rekam-medis/detail/{id}', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'updateDetail'])->name('dokter.rekam_medis.detail.update');
    route::delete('dokter/rekam-medis/detail/{id}', [App\Http\Controllers\Dokter\RekamMedisDokterController::class, 'destroyDetail'])->name('dokter.rekam_medis.detail.destroy');

    // Profile
    route::get('dokter/profile', [App\Http\Controllers\Dokter\DokterController::class, 'profile'])->name('dokter.profile');
});

route::middleware('isPerawat')->group(function() {
    route::get('Dashboard_Perawat', [PerawatController::class, 'Dashboard_Perawat'])->name('Dashboard_Perawat');
    route::get('perawat/profile', [PerawatController::class, 'profile'])->name('perawat.profile');
});

route::middleware('isPemilik')->group(function() {
    route::get('Dashboard_Pemilik', [PemilikController::class, 'Dashboard_Pemilik'])->name('Dashboard_Pemilik');
    route::get('pemilik/profile', [PemilikController::class, 'profile'])->name('pemilik.profile');
});