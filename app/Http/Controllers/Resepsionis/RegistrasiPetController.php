<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\Ras_hewan;

class RegistrasiPetController extends Controller
{
    public function create()
    {
        $pemiliks = Pemilik::with('user')->get();
        $races = Ras_hewan::with('jenisHewan')->get();
        return view('Roles.Resepsionis.Views.create_pet', compact('pemiliks', 'races'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'warna_tanda' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
        ]);

        Pet::create($request->all());

        return redirect()->back()->with('success', 'Pet baru berhasil didaftarkan');
    }
}
