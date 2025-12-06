<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    public function Dashboard_Resepsionis()
    {
        return view('Roles.Resepsionis.Dashboard_Resepsionis');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('Roles.Resepsionis.Views.Profile', compact('user'));
    }
}
