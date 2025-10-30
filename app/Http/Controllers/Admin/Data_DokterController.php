<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role_user;

class Data_DokterController extends Controller
{
    public function DataDokter()
    {
        $dokters = Role_user::with('user')
            ->where('idrole', 2)
            ->get();
        return view('Roles/Admin/Views/Data_Dokter', compact('dokters'));
    }
}
