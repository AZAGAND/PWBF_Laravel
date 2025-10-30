<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class Data_HewanController extends Controller
{
    public function DataHewan()
    {
        $pets = Pet::with([
            'pemilik.user',
            'rasHewan.jenisHewan'
        ])->get();

        return view('Roles/Admin/Views/Data_Hewan', compact('pets'));
    }
}
