<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class Data_KategoriController extends Controller
{
    public function DataKategori()
    {
        $kategoris = Kategori::all();
        return view('Roles/Admin/Views/Data_Kategori', compact('kategoris'));
    }
}
