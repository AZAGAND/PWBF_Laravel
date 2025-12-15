<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;

class DataPemilikController extends Controller
{
    public function DataPemilik()
    {
        $datapemilik = Pemilik::with('user')->get();
        return view('Roles.Admin.Views.Data_Pemilik', compact('datapemilik'));
    }

    public function create()
    {
        $users = \App\Models\User::whereDoesntHave('pemilik')->get(); 
        return view('Roles.Admin.Views.Feature.Create_Pemilik', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:User,iduser|unique:pemilik,iduser',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            Pemilik::create($request->all());
            return redirect()->route('data_pemilik')->with('success', 'Data pemilik berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $users = \App\Models\User::all();
        return view('Roles.Admin.Views.Feature.Edit_Pemilik', compact('pemilik', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser' => 'required|exists:User,iduser|unique:pemilik,iduser,' . $id . ',idpemilik',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        $pemilik = Pemilik::findOrFail($id);
        $pemilik->update($request->all());

        return redirect()->route('data_pemilik')->with('success', 'Data pemilik berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $pemilik->delete();

        return redirect()->route('data_pemilik')->with('success', 'Data pemilik berhasil dihapus');
    }
    public function trash()
    {
        $pemiliks = Pemilik::onlyTrashed()->with('user')->get();
        return view('Roles.Admin.Views.Trash_Pemilik', compact('pemiliks'));
    }

    public function restore($id)
    {
        $pemilik = Pemilik::onlyTrashed()->findOrFail($id);
        $pemilik->restore();

        return redirect()->route('pemilik.trash')->with('success', 'Data pemilik berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $pemilik = Pemilik::onlyTrashed()->findOrFail($id);
        $pemilik->forceDelete();

        return redirect()->route('pemilik.trash')->with('success', 'Data pemilik berhasil dihapus permanen');
    }
}
