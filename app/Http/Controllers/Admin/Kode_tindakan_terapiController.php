<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kode_tindakan_terapi;

class Kode_tindakan_terapiController extends Controller
{
    public function DataKodeTindakanTerapi()
    {
        $kode_tindakan_terapis = Kode_tindakan_terapi::with(relations: 'kategoriklinis')->get();
        return view('Roles/Admin/Views/Data_Kode_Tindakan_Terapi', compact('kode_tindakan_terapis'));
    }
}
