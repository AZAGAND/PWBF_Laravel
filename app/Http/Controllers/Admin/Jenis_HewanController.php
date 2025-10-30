<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jenis_hewan;

class Jenis_HewanController extends Controller
{
    public function DataJenisHewan()
    {
        $jenishewan = jenis_hewan::all();
        return view('Roles/Admin/Views/Jenis_Hewan', compact('jenishewan'));
    }
}
