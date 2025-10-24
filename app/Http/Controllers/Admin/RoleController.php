<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function DataRole()
    {
        $users = User::with([
            'roles' => function ($q) {
                $q->withPivot('idrole_user', 'status');
            }
        ])->get();
        return view('Roles/Admin/Views/Data_Role', compact('users'));
    }
}
