<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
    
});

route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/home', [SiteController::class, 'index'])->name('site.home');
route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('site.visi-misi');
route::get('/struktur-Organisasi', [SiteController::class, 'struktur'])->name('struktur_organisasi');

