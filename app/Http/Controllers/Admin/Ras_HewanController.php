<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ras_hewan;

class Ras_HewanController extends Controller
{
    public function DataRasHewan()
    {
        $rasHewans = Ras_hewan::with('jenisHewan')->get();
        return view('Roles/Admin/Views/Ras_Hewan', compact('rasHewans'));
    }
}
