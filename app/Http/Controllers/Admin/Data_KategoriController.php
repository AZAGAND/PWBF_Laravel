<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class Data_KategoriController extends Controller
{
    public function DataKategori()
    {
        $kategoris = Kategori::all();
        return view('Roles.Admin.Views.Data_Kategori', compact('kategoris'));
    }

    public function create()
    {
        return view('Roles.Admin.Views.Feature.Create_Kategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());

        return redirect()->route('data_kategori')->with('success', 'Data kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Roles.Admin.Views.Feature.Edit_Kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('data_kategori')->with('success', 'Data kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('data_kategori')->with('success', 'Data kategori berhasil dihapus');
    }

    public function trash()
    {
        $kategoris = Kategori::onlyTrashed()->get();
        return view('Roles.Admin.Views.Trash_Kategori', compact('kategoris'));
    }

    public function restore($id)
    {
        $kategori = Kategori::onlyTrashed()->findOrFail($id);
        $kategori->restore();

        return redirect()->route('kategori.trash')->with('success', 'Data kategori berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $kategori = Kategori::onlyTrashed()->findOrFail($id);
        $kategori->forceDelete();

        return redirect()->route('kategori.trash')->with('success', 'Data kategori berhasil dihapus permanen');
    }
}
