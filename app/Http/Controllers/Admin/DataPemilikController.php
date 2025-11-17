<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;

class DataPemilikController extends Controller
{
    public function DataPemilik()
    {
        $datapemilik = Pemilik::with('user')->get();
        return view('Roles/Admin/Views/Data_Pemilik', compact('datapemilik'));
    }
}
