<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function DataUser()
    {
        $users = User::all();
        return view('Roles/Admin/Views/Data_User', compact('users'));
    }
}
