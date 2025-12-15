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
use App\Http\Controllers\Resepsionis\RegistrasiPemilikController;
use App\Http\Controllers\Resepsionis\RegistrasiPetController;
use App\Http\Controllers\Resepsionis\TemuDokterController;
use App\Http\Controllers\Perawat\PerawatController;
use App\Http\Controllers\Perawat\RekamMedisController;
use App\Http\Controllers\Perawat\EditRekamMedisController;
use App\Http\Controllers\Perawat\DetailRekamMedisController;
use App\Http\Controllers\Perawat\ReservasiController;
use App\Http\Controllers\Pemilik\PemilikController;
use App\Http\Controllers\Pemilik\ListHewanController;
use App\Http\Controllers\Pemilik\ListReservasiController;
use App\Http\Controllers\Pemilik\ListDetailRekamMedisController;
use App\Http\Controllers\Pemilik\ListRekamMedisController;


Route::get('/', function () {
    return view('site.home');
});

Route::controller(SiteController::class)->group(function () {
    Route::get('/home', 'index')->name('site.home');
    Route::get('/layanan', 'layanan')->name('site.layanan');
    Route::get('/visi-misi', 'visiMisi')->name('site.visi-misi');
    Route::get('/struktur-Organisasi', 'struktur')->name('struktur_organisasi');
});

Auth::routes();

route::middleware('isAdministrator')->group(function() {
    route::get('dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard_Admin');
    route::get('data_master', [DashboardController::class, 'DataMaster'])->name('data_master');
    
    // Profile
    route::get('profile', [DashboardController::class, 'profile'])->name('admin.profile');

    Route::controller(UserController::class)->group(function () {
        route::get('data_user', 'DataUser')->name('data_user');
        route::get('users/trash', 'trash')->name('users.trash'); // Trash Route
        route::get('users/create', 'create')->name('users.create');
        route::post('users', 'store')->name('users.store');
        route::get('users/{user}/edit', 'edit')->name('users.edit');
        route::put('users/{user}', 'update')->name('users.update');
        route::delete('users/{user}', 'destroy')->name('users.destroy');
        route::put('users/{id}/restore', 'restore')->name('users.restore'); // Restore Route
        route::delete('users/{id}/force-delete', 'forceDelete')->name('users.force_delete'); // Force Delete Route
        route::get('users/{user}/password', 'password')->name('users.password');
        route::put('users/{user}/password', 'updatePassword')->name('users.update_password');
    });

    // Role Management
    Route::controller(RoleController::class)->group(function () {
        route::get('data_role', 'DataRole')->name('data_role');
        route::get('roles/trash', 'trash')->name('role.trash'); // Trash Route
        route::get('roles/create', 'create')->name('roles.create');
        route::post('roles', 'store')->name('roles.store');
        route::get('roles/{id}/edit', 'edit')->name('roles.edit');
        route::put('roles/{id}', 'update')->name('roles.update');
        route::delete('roles/{id}', 'destroy')->name('roles.delete');
        route::patch('roles/{id}/toggle', 'toggleStatus')->name('roles.toggle');
        route::put('roles/{id}/restore', 'restore')->name('role.restore'); // Restore Route
        route::delete('roles/{id}/force-delete', 'forceDelete')->name('role.force_delete'); // Force Delete Route
    });

    Route::controller(Ras_HewanController::class)->group(function () {
        route::get('ras_hewan', 'DataRasHewan')->name('ras_hewan');
        route::get('ras_hewan/trash', 'trash')->name('ras.trash'); // Trash
        route::get('ras_hewan/create', 'create')->name('ras.create');
        route::post('ras_hewan', 'store')->name('ras.store');
        route::get('ras_hewan/{id}/edit', 'edit')->name('ras.edit');
        route::put('ras_hewan/{id}', 'update')->name('ras.update');
        route::delete('ras_hewan/{id}', 'destroy')->name('ras.destroy');
        route::put('ras_hewan/{id}/restore', 'restore')->name('ras.restore'); // Restore
        route::delete('ras_hewan/{id}/force-delete', 'forceDelete')->name('ras.force_delete'); // Force Delete
    });

    Route::controller(Jenis_HewanController::class)->group(function () {
        route::get('jenis_hewan', 'DataJenisHewan')->name('jenis_hewan');
        route::get('jenis_hewan/trash', 'trash')->name('jenis.trash'); // Trash
        route::get('jenis_hewan/create', 'create')->name('jenis.create');
        route::post('jenis_hewan', 'store')->name('jenis.store');
        route::get('jenis_hewan/{id}/edit', 'edit')->name('jenis.edit');
        route::put('jenis_hewan/{id}', 'update')->name('jenis.update');
        route::delete('jenis_hewan/{id}', 'destroy')->name('jenis.destroy');
        route::put('jenis_hewan/{id}/restore', 'restore')->name('jenis.restore'); // Restore
        route::delete('jenis_hewan/{id}/force-delete', 'forceDelete')->name('jenis.force_delete'); // Force Delete
    });

    Route::controller(DataPemilikController::class)->group(function () {
        route::get('data_pemilik', 'DataPemilik')->name('data_pemilik');
        route::get('data_pemilik/trash', 'trash')->name('pemilik.trash'); // Trash Route
        route::get('data_pemilik/create', 'create')->name('pemilik.create');
        route::post('data_pemilik', 'store')->name('pemilik.store');
        route::get('data_pemilik/{id}/edit', 'edit')->name('pemilik.edit');
        route::put('data_pemilik/{id}', 'update')->name('pemilik.update');
        route::delete('data_pemilik/{id}', 'destroy')->name('pemilik.destroy');
        route::put('data_pemilik/{id}/restore', 'restore')->name('pemilik.restore'); // Restore Route
        route::delete('data_pemilik/{id}/force-delete', 'forceDelete')->name('pemilik.force_delete'); // Force Delete Route
    });

    Route::controller(Data_DokterController::class)->group(function () {
        route::get('data_dokter', 'DataDokter')->name('data_dokter');
        route::get('data_dokter/create', 'create')->name('dokter.create');
        route::post('data_dokter', 'store')->name('dokter.store');
        route::get('data_dokter/{id}/edit', 'edit')->name('dokter.edit');
        route::put('data_dokter/{id}', 'update')->name('dokter.update');
        route::delete('data_dokter/{id}', 'destroy')->name('dokter.destroy');
    });
    
    Route::controller(Data_HewanController::class)->group(function () {
        route::get('data_hewan', 'DataHewan')->name('data_hewan');
        route::get('data_hewan/trash', 'trash')->name('hewan.trash'); // Trash
        route::get('data_hewan/create', 'create')->name('hewan.create');
        route::post('data_hewan', 'store')->name('hewan.store');
        route::get('data_hewan/{id}/edit', 'edit')->name('hewan.edit');
        route::put('data_hewan/{id}', 'update')->name('hewan.update');
        route::delete('data_hewan/{id}', 'destroy')->name('hewan.destroy');
        route::put('data_hewan/{id}/restore', 'restore')->name('hewan.restore'); // Restore
        route::delete('data_hewan/{id}/force-delete', 'forceDelete')->name('hewan.force_delete'); // Force Delete
    });
    
    Route::controller(Data_KategoriController::class)->group(function () {
        route::get('data_kategori', 'DataKategori')->name('data_kategori');
        route::get('data_kategori/trash', 'trash')->name('kategori.trash'); // Trash
        route::get('data_kategori/create', 'create')->name('kategori.create');
        route::post('data_kategori', 'store')->name('kategori.store');
        route::get('data_kategori/{id}/edit', 'edit')->name('kategori.edit');
        route::put('data_kategori/{id}', 'update')->name('kategori.update');
        route::delete('data_kategori/{id}', 'destroy')->name('kategori.destroy');
        route::put('data_kategori/{id}/restore', 'restore')->name('kategori.restore'); // Restore
        route::delete('data_kategori/{id}/force-delete', 'forceDelete')->name('kategori.force_delete'); // Force Delete
    });
    
    Route::controller(Kategori_KlinisController::class)->group(function () {
        route::get('data_kategori_klinis', 'DataKategoriKlinis')->name('data_kategori_klinis');
        route::get('data_kategori_klinis/trash', 'trash')->name('kategori_klinis.trash'); // Trash
        route::get('data_kategori_klinis/create', 'create')->name('kategori_klinis.create');
        route::post('data_kategori_klinis', 'store')->name('kategori_klinis.store');
        route::get('data_kategori_klinis/{id}/edit', 'edit')->name('kategori_klinis.edit');
        route::put('data_kategori_klinis/{id}', 'update')->name('kategori_klinis.update');
        route::delete('data_kategori_klinis/{id}', 'destroy')->name('kategori_klinis.destroy');
        route::put('data_kategori_klinis/{id}/restore', 'restore')->name('kategori_klinis.restore'); // Restore
        route::delete('data_kategori_klinis/{id}/force-delete', 'forceDelete')->name('kategori_klinis.force_delete'); // Force Delete
    });
    
    Route::controller(Kode_tindakan_terapiController::class)->group(function () {
        route::get('data_kode_tindakan_terapi', 'DataKodeTindakanTerapi')->name('data_kode_tindakan_terapi');
        route::get('data_kode_tindakan_terapi/trash', 'trash')->name('kode_tindakan_terapi.trash'); // Trash
        route::get('data_kode_tindakan_terapi/create', 'create')->name('kode_tindakan_terapi.create');
        route::post('data_kode_tindakan_terapi', 'store')->name('kode_tindakan_terapi.store');
        route::get('data_kode_tindakan_terapi/{id}/edit', 'edit')->name('kode_tindakan_terapi.edit');
        route::put('data_kode_tindakan_terapi/{id}', 'update')->name('kode_tindakan_terapi.update');
        route::delete('data_kode_tindakan_terapi/{id}', 'destroy')->name('kode_tindakan_terapi.destroy');
        route::put('data_kode_tindakan_terapi/{id}/restore', 'restore')->name('kode_tindakan_terapi.restore'); // Restore
        route::delete('data_kode_tindakan_terapi/{id}/force-delete', 'forceDelete')->name('kode_tindakan_terapi.force_delete'); // Force Delete
    });
});

route::middleware('isResepsionis')->group(function() {
    
    Route::controller(ResepsionisController::class)->group(function () {
        route::get('Dashboard_Resepsionis', 'Dashboard_Resepsionis')->name('Dashboard_Resepsionis');
        route::get('resepsionis/profile', 'profile')->name('resepsionis.profile');
    });
    
    // Registrasi Pemilik
    Route::controller(RegistrasiPemilikController::class)->group(function () {
        route::get('resepsionis/pemilik/create', 'create')->name('resepsionis.pemilik.create');
        route::post('resepsionis/pemilik', 'store')->name('resepsionis.pemilik.store');
    });

    // Registrasi Pet
    Route::controller(RegistrasiPetController::class)->group(function () {
        route::get('resepsionis/hewan/create', 'create')->name('resepsionis.hewan.create');
        route::post('resepsionis/hewan', 'store')->name('resepsionis.hewan.store');
    });

    // Manajemen Temu Dokter
    Route::controller(TemuDokterController::class)->group(function () {
        route::get('resepsionis/temu-dokter', 'index')->name('resepsionis.temu_dokter');
        route::post('resepsionis/temu-dokter', 'store')->name('resepsionis.temu_dokter.store');
        route::delete('resepsionis/temu-dokter/{id}', 'destroy')->name('resepsionis.temu_dokter.destroy');
    });
});

route::middleware('isDokter')->group(function() {
    Route::controller(DokterController::class)->group(function () {
        route::get('Dashboard_Dokter', 'Dashboard_Dokter')->name('Dashboard_Dokter');
        route::get('dokter/profile', 'profile')->name('dokter.profile');
    });

    Route::controller(App\Http\Controllers\Dokter\RekamMedisDokterController::class)->group(function () {
        route::get('dokter/rekam-medis', 'index')->name('dokter.rekam_medis');
    });

    Route::controller(App\Http\Controllers\Dokter\DetailRekamMedis::class)->group(function () {
        route::get('dokter/rekam-medis/{id}', 'show')->name('dokter.rekam_medis.show');
        
        // CRUD Detail Rekam Medis
        route::post('dokter/rekam-medis/detail', 'storeDetail')->name('dokter.rekam_medis.detail.store');
        route::put('dokter/rekam-medis/detail/{id}', 'updateDetail')->name('dokter.rekam_medis.detail.update');
        route::delete('dokter/rekam-medis/detail/{id}', 'destroyDetail')->name('dokter.rekam_medis.detail.destroy');
    });
});

route::middleware('isPerawat')->group(function() {
    Route::controller(PerawatController::class)->group(function () {
        route::get('Dashboard_Perawat', 'Dashboard_Perawat')->name('Dashboard_Perawat');
        route::get('perawat/profile', 'profile')->name('perawat.profile');
    });
    
    // Rekam Medis
    Route::controller(RekamMedisController::class)->group(function () {
        route::get('perawat/rekam-medis', 'index')->name('perawat.rekam_medis');
        route::post('perawat/rekam-medis', 'store')->name('perawat.rekam_medis.store');
    });
    
    Route::controller(EditRekamMedisController::class)->group(function () {
        route::get('perawat/rekam-medis/{id}/edit', 'edit')->name('perawat.rekam_medis.edit');
        route::put('perawat/rekam-medis/{id}', 'update')->name('perawat.rekam_medis.update');
    });

    Route::controller(DetailRekamMedisController::class)->group(function () {
        route::get('perawat/rekam-medis/{id}', 'show')->name('perawat.rekam_medis.show');
    });
    
    // Reservasi
    Route::controller(ReservasiController::class)->group(function () {
        route::get('perawat/reservasi', 'index')->name('perawat.reservasi');
        route::put('perawat/reservasi/{id}', 'update')->name('perawat.reservasi.update');
        route::delete('perawat/reservasi/{id}', 'destroy')->name('perawat.reservasi.destroy');
    });
});

route::middleware('isPemilik')->group(function() {
    Route::controller(PemilikController::class)->group(function () {
        route::get('Dashboard_Pemilik', 'Dashboard_Pemilik')->name('Dashboard_Pemilik');
        route::get('pemilik/profile', 'profile')->name('pemilik.profile');
    });
    
    // Fitur Pemilik
    Route::controller(ListHewanController::class)->group(function () {
        route::get('pemilik/hewan', 'index')->name('pemilik.hewan');
    });
    
    Route::controller(ListReservasiController::class)->group(function () {
        route::get('pemilik/reservasi', 'index')->name('pemilik.reservasi');
    });
    
    Route::controller(ListRekamMedisController::class)->group(function () {
        route::get('pemilik/rekam-medis', 'index')->name('pemilik.rekam_medis');
    });

    Route::controller(ListDetailRekamMedisController::class)->group(function () {
        route::get('pemilik/rekam-medis/{id}', 'show')->name('pemilik.rekam_medis.show');
    });
});