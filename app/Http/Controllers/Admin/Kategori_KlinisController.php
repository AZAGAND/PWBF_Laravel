<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori_klinis;

class Kategori_KlinisController extends Controller
{
    public function DataKategoriKlinis()
    {
        $kategori_klinis = Kategori_klinis::all();
        return view('Roles.Admin.Views.Data_Kategori_Klinis', compact('kategori_klinis'));
    }

    public function create()
    {
        return view('Roles.Admin.Views.Feature.Create_Kategori_Klinis');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:255',
        ]);

        Kategori_klinis::create($request->all());

        return redirect()->route('data_kategori_klinis')->with('success', 'Data kategori klinis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori_klinis = Kategori_klinis::findOrFail($id);
        return view('Roles.Admin.Views.Feature.Edit_Kategori_Klinis', compact('kategori_klinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:255',
        ]);

        $kategori_klinis = Kategori_klinis::findOrFail($id);
        $kategori_klinis->update($request->all());

        return redirect()->route('data_kategori_klinis')->with('success', 'Data kategori klinis berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori_klinis = Kategori_klinis::findOrFail($id);
        $kategori_klinis->delete();

        return redirect()->route('data_kategori_klinis')->with('success', 'Data kategori klinis berhasil dihapus');
    }

    public function trash()
    {
        $kategori_klinis = Kategori_klinis::onlyTrashed()->get();
        return view('Roles.Admin.Views.Trash_Kategori_Klinis', compact('kategori_klinis'));
    }

    public function restore($id)
    {
        $kategori_klinis = Kategori_klinis::onlyTrashed()->findOrFail($id);
        $kategori_klinis->restore();

        return redirect()->route('kategori_klinis.trash')->with('success', 'Data kategori klinis berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $kategori_klinis = Kategori_klinis::onlyTrashed()->findOrFail($id);
        $kategori_klinis->forceDelete();

        return redirect()->route('kategori_klinis.trash')->with('success', 'Data kategori klinis berhasil dihapus permanen');
    }
}
