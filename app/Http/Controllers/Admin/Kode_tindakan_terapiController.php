<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kode_tindakan_terapi;

class Kode_tindakan_terapiController extends Controller
{
    public function DataKodeTindakanTerapi()
    {
        $kode_tindakan_terapis = Kode_tindakan_terapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('Roles.Admin.Views.Data_Kode_Tindakan_Terapi', compact('kode_tindakan_terapis'));
    }

    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        $kategori_klinis = \App\Models\Kategori_klinis::all();
        return view('Roles.Admin.Views.Feature.Create_Kode_Tindakan_Terapi', compact('kategoris', 'kategori_klinis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:kode_tindakan_terapi,kode',
            'deskripsi_tindakan_terapi' => 'required|string',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        Kode_tindakan_terapi::create($request->all());

        return redirect()->route('data_kode_tindakan_terapi')->with('success', 'Data kode tindakan terapi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Kode_tindakan_terapi::findOrFail($id);
        $kategoris = \App\Models\Kategori::all();
        $kategori_klinis = \App\Models\Kategori_klinis::all();
        return view('Roles.Admin.Views.Feature.Edit_Kode_Tindakan_Terapi', compact('item', 'kategoris', 'kategori_klinis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi',
            'deskripsi_tindakan_terapi' => 'required|string',
            'idkategori' => 'required|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|exists:kategori_klinis,idkategori_klinis',
        ]);

        $item = Kode_tindakan_terapi::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('data_kode_tindakan_terapi')->with('success', 'Data kode tindakan terapi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = Kode_tindakan_terapi::findOrFail($id);
        $item->delete();

        return redirect()->route('data_kode_tindakan_terapi')->with('success', 'Data kode tindakan terapi berhasil dihapus');
    }

    public function trash()
    {
        $kode_tindakan_terapis = Kode_tindakan_terapi::onlyTrashed()->with(['kategori', 'kategoriKlinis'])->get();
        return view('Roles.Admin.Views.Trash_Kode_Tindakan_Terapi', compact('kode_tindakan_terapis'));
    }

    public function restore($id)
    {
        $item = Kode_tindakan_terapi::onlyTrashed()->findOrFail($id);
        $item->restore();

        return redirect()->route('kode_tindakan_terapi.trash')->with('success', 'Data kode tindakan terapi berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $item = Kode_tindakan_terapi::onlyTrashed()->findOrFail($id);
        $item->forceDelete();

        return redirect()->route('kode_tindakan_terapi.trash')->with('success', 'Data kode tindakan terapi berhasil dihapus permanen');
    }
}
