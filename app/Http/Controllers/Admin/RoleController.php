<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_user;
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

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('Roles.Admin.Views.Feature.Create_Role', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
        ]);

        $exists = Role_user::where('iduser', $request->iduser)
            ->where('idrole', $request->idrole)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'User sudah memiliki role ini.');
        }

        Role_user::create([
            'iduser' => $request->iduser,
            'idrole' => $request->idrole,
            'status' => true
        ]);

        return redirect()->route('data_role')->with('success', 'Role berhasil ditambahkan ke user.');
    }

    public function edit($id)
    {
        $roleUser = Role_user::with(['user', 'role'])->findOrFail($id);
        $roles = Role::all();
        return view('Roles.Admin.Views.Feature.Edit_Role', compact('roleUser', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idrole' => 'required|exists:role,idrole',
        ]);

        $roleUser = Role_user::findOrFail($id);
        
        if ($roleUser->idrole != $request->idrole) {
            $exists = Role_user::where('iduser', $roleUser->iduser)
                ->where('idrole', $request->idrole)
                ->exists();
                
            if ($exists) {
                return redirect()->back()->with('error', 'User sudah memiliki role ini.');
            }
        }

        $roleUser->update([
            'idrole' => $request->idrole
        ]);

        return redirect()->route('data_role')->with('success', 'Role user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $roleUser = Role_user::findOrFail($id);
        $roleUser->delete();
        return redirect()->back()->with('success', 'Role berhasil dihapus dari user.');
    }

    public function toggleStatus($id)
    {
        $roleUser = Role_user::findOrFail($id);
        $roleUser->status = !$roleUser->status;
        $roleUser->save();

        return redirect()->back()->with('success', 'Status role berhasil diubah.');
    }
}
