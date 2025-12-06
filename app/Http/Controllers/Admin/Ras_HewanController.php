<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ras_hewan;

class Ras_HewanController extends Controller
{
    public function DataRasHewan()
    {
        $rasHewans = Ras_hewan::with('jenisHewan')->get();
        return view('Roles/Admin/Views/Data_Ras_Hewan', compact('rasHewans'));
    }

    public function create()
    {
        $jenisHewans = \App\Models\Jenis_hewan::all();
        return view('Roles.Admin.Views.Feature.Create_Ras', compact('jenisHewans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:255',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        Ras_hewan::create($request->all());

        return redirect()->route('ras_hewan')->with('success', 'Data ras hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rasHewan = Ras_hewan::findOrFail($id);
        $jenisHewans = \App\Models\Jenis_hewan::all();
        return view('Roles.Admin.Views.Feature.Edit_Ras', compact('rasHewan', 'jenisHewans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:255',
            'idjenis_hewan' => 'required|exists:jenis_hewan,idjenis_hewan',
        ]);

        $rasHewan = Ras_hewan::findOrFail($id);
        $rasHewan->update($request->all());

        return redirect()->route('ras_hewan')->with('success', 'Data ras hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rasHewan = Ras_hewan::findOrFail($id);
        $rasHewan->delete();

        return redirect()->route('ras_hewan')->with('success', 'Data ras hewan berhasil dihapus');
    }
}
