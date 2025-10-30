<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_klinis;

class Kategori_KlinisController extends Controller
{
    public function DataKategoriKlinis()
    {
        $kategori_klinis = Kategori_klinis::all();
        return view('Roles/Admin/Views/Data_Kategori_Klinis', compact('kategori_klinis'));
    }
}
