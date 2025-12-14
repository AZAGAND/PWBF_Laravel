<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemilik;
use App\Models\Role_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistrasiPemilikController extends Controller
{
    public function create()
    {
        return view('Roles.Resepsionis.Views.create_pemilik');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Pemilik',
            ]);

            Role_user::create([
                'iduser' => $user->iduser,
                'idrole' => 4 
            ]);

            Pemilik::create([
                'iduser' => $user->iduser,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Pemilik baru berhasil didaftarkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mendaftar: ' . $e->getMessage())->withInput();
        }
    }
}
