<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class Data_HewanController extends Controller
{
    public function DataHewan()
    {
        $pets = Pet::with([
            'pemilik.user',
            'rasHewan.jenisHewan'
        ])->get();

        return view('Roles.Admin.Views.Data_Hewan', compact('pets'));
    }

    public function create()
    {
        $pemiliks = \App\Models\Pemilik::with('user')->get();
        // Load Ras with Jenis for clear selection (e.g. "Persia - Kucing")
        $races = \App\Models\Ras_Hewan::with('jenisHewan')->get();
        
        return view('Roles.Admin.Views.Feature.Create_Hewan', compact('pemiliks', 'races'));
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

        return redirect()->route('data_hewan')->with('success', 'Data hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $pemiliks = \App\Models\Pemilik::with('user')->get();
        $races = \App\Models\Ras_Hewan::with('jenisHewan')->get();

        return view('Roles.Admin.Views.Feature.Edit_Hewan', compact('pet', 'pemiliks', 'races'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'warna_tanda' => 'nullable|string|max:255',
            'tanggal_lahir' => 'required|date',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        return redirect()->route('data_hewan')->with('success', 'Data hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('data_hewan')->with('success', 'Data hewan berhasil dihapus');
    }
}
