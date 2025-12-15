<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jenis_hewan;

class Jenis_HewanController extends Controller
{
    public function DataJenisHewan()
    {
        $jenisHewans = Jenis_hewan::all();
        return view('Roles.Admin.Views.Data_Jenis_Hewan', compact('jenisHewans'));
    }

    public function create()
    {
        return view('Roles.Admin.Views.Feature.Create_Jenis_Hewan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        Jenis_hewan::create($request->all());

        return redirect()->route('jenis_hewan')->with('success', 'Jenis hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenisHewan = Jenis_hewan::findOrFail($id);
        return view('Roles.Admin.Views.Feature.Edit_Jenis_Hewan', compact('jenisHewan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100',
        ]);

        $jenisHewan = Jenis_hewan::findOrFail($id);
        $jenisHewan->update($request->all());

        return redirect()->route('jenis_hewan')->with('success', 'Jenis hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jenisHewan = Jenis_hewan::findOrFail($id);
        $jenisHewan->delete();

        return redirect()->route('jenis_hewan')->with('success', 'Jenis hewan berhasil dihapus');
    }
    public function trash()
    {
        $jenisHewans = Jenis_hewan::onlyTrashed()->all();
        return view('Roles.Admin.Views.Trash_Jenis_Hewan', compact('jenisHewans'));
    }

    public function restore($id)
    {
        $jenisHewan = Jenis_hewan::onlyTrashed()->findOrFail($id);
        $jenisHewan->restore();

        return redirect()->route('jenis.trash')->with('success', 'Jenis hewan berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $jenisHewan = Jenis_hewan::onlyTrashed()->findOrFail($id);
        $jenisHewan->forceDelete();

        return redirect()->route('jenis.trash')->with('success', 'Jenis hewan berhasil dihapus permanen');
    }
}
