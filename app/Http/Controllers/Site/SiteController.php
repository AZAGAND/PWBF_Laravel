<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }

    public function layanan()
    {
        return view('site.layanan');
    }

    public function visiMisi()
    {
        return view('site.visi-misi');
    }

    public function struktur()
    {
        return view('site.struktur_organisasi');
    }
}
