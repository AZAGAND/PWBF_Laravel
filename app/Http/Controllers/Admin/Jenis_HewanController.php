<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jenis_hewan;

class Jenis_HewanController extends Controller
{
    public function DataJenisHewan()
    {
        $jenishewan = jenis_hewan::all();
        return view('roles.admin.views.jenis_hewan', compact('jenishewan'));
    }

    public function CreateJenisHewan()
    {
        return view('roles.admin.views.feature.formjenishewan');
    }

    public function StoreJenisHewan(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|max:100',
        ]);

        jenis_hewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('jenis_hewan')
            ->with('ok', 'Jenis hewan berhasil ditambahkan!');
    }

    protected function createJenisHewanHelper(array $data)
    {
        try {
            return Jenis_Hewan::create([
                'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menyimpan data jenis hewan: ' . $e->getMessage());
        }
    }

    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }

}
