<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role_user;

class Data_DokterController extends Controller
{
    public function DataDokter()
    {
        // Get all users who have role 2 (Dokter)
        $dokters = Role_user::with('user')
            ->where('idrole', 2)
            ->get();
            
        return view('Roles.Admin.Views.Data_Dokter', compact('dokters'));
    }

    public function create()
    {
        // Get users who are NOT yet assigned as Dokter (role 2)
        // We check existing role_user records where idrole = 2
        $existingDokterIds = Role_user::where('idrole', 2)->pluck('iduser');
        
        $users = \App\Models\User::whereNotIn('iduser', $existingDokterIds)->get();

        return view('Roles.Admin.Views.Feature.Create_Dokter', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:User,iduser', // Check User table
        ]);

        // Validate uniqueness manually or via rule to ensure this user isn't already a doctor
        // (though the create form filtering helps, direct post needs protection)
        $exists = Role_user::where('iduser', $request->iduser)->where('idrole', 2)->exists();
        if ($exists) {
            return back()->with('error', 'User ini sudah terdaftar sebagai dokter.')->withInput();
        }

        Role_user::create([
            'iduser' => $request->iduser,
            'idrole' => 2, // 2 is Dokter
            'status' => 1,
        ]);

        return redirect()->route('data_dokter')->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        // $id here is idrole_user
        $dokter = Role_user::with('user')->findOrFail($id);
        
        // For editing, we might want to allow changing the user? 
        // Or maybe just show who it is. Let's allow changing the user but filter out existing doctors (except self).
        $existingDokterIds = Role_user::where('idrole', 2)->where('iduser', '!=', $dokter->iduser)->pluck('iduser');
        $users = \App\Models\User::whereNotIn('iduser', $existingDokterIds)->get();

        return view('Roles.Admin.Views.Feature.Edit_Dokter', compact('dokter', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser' => 'required|exists:User,iduser',
            'status' => 'required|in:0,1',
        ]);

        $dokter = Role_user::findOrFail($id);

        // Check if new user is already a doctor (unless it's the same user)
        if ($request->iduser != $dokter->iduser) {
            $exists = Role_user::where('iduser', $request->iduser)->where('idrole', 2)->exists();
            if ($exists) {
                return back()->with('error', 'User yang dipilih sudah menjadi dokter.')->withInput();
            }
        }

        $dokter->update([
            'iduser' => $request->iduser,
            'status' => $request->status,
        ]);

        return redirect()->route('data_dokter')->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokter = Role_user::findOrFail($id);
        $dokter->delete();

        return redirect()->route('data_dokter')->with('success', 'Data dokter berhasil dihapus');
    }
}
