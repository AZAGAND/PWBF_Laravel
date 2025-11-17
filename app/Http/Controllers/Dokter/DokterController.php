<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function Dashboard_Dokter() {
        return view('Roles.dokter.Dashboard_Dokter');
    }
}
