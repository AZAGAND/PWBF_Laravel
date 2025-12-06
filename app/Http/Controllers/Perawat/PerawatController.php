<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function Dashboard_Perawat () {
        return view('Roles.Perawat.Dashboard_Perawat');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('Roles.Perawat.Views.Profile', compact('user'));
    }
}
