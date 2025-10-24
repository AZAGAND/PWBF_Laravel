<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function Dashboard()
    {
        return view('Roles.Admin.dashboard');
    }

    public function DataMaster()
    {
        return view('Roles.Admin.data_master');
    }
}
