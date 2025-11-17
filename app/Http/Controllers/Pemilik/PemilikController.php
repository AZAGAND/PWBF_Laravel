<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function Dashboard_Pemilik()
    {
        return view('roles.pemilik.Dashboard_Pemilik');
    }
}
