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

    public function create()
    {
        $roles = \App\Models\Role::all();
        return view('Roles.Admin.Views.Feature.Create_User', compact('roles'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:User,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach($request->role, ['status' => 1]);

        return redirect()->route('data_user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = \App\Models\Role::all();
        return view('Roles.Admin.Views.Feature.Edit_User', compact('user', 'roles'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:User,email,' . $id . ',iduser',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);
        $user->roles()->syncWithPivotValues([$request->role], ['status' => 1]);

        return redirect()->route('data_user')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // $user->roles()->detach(); // Keep roles for soft delete restoration
        $user->delete();
        return redirect()->route('data_user')->with('success', 'User berhasil dihapus');
    }

    public function password($id)
    {
        $user = User::findOrFail($id);
        return view('Roles.Admin.Views.Feature.Edit_Password', compact('user'));
    }

    public function updatePassword(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('data_user')->with('success', 'Password berhasil diubah');
    }
    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('Roles.Admin.Views.Trash_User', compact('users'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('users.trash')->with('success', 'User berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->roles()->detach(); // Detach roles before permanent delete
        $user->forceDelete();
        return redirect()->route('users.trash')->with('success', 'User berhasil dihapus permanen');
    }
}
