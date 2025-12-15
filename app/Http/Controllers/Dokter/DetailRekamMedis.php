<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekam_medis;
use App\Models\Detail_rekam_medis;
use App\Models\Kode_tindakan_terapi;

class DetailRekamMedis extends Controller
{
    public function show($id)
    {
        $rekamMedis = Rekam_medis::with([
            'temuDokter.pet.pemilik.user',
            'temuDokter.pet.rasHewan',
            'dokterPemeriksa.user',
            'detailRekamMedis.tindakanTerapi'
        ])->findOrFail($id);

        $kodeTindakan = Kode_tindakan_terapi::all();

        return view('Roles.Dokter.Views.DetailRekamMedis', compact('rekamMedis', 'kodeTindakan'));
    }

    public function storeDetail(Request $request)
    {
        $request->validate([
            'idrekam_medis' => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'nullable|string'
        ]);

        Detail_rekam_medis::create([
            'idrekam_medis' => $request->idrekam_medis,
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail
        ]);

        return redirect()->back()->with('success', 'Tindakan terapi berhasil ditambahkan.');
    }

    public function updateDetail(Request $request, $id)
    {
        $request->validate([
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'nullable|string'
        ]);

        $detail = Detail_rekam_medis::findOrFail($id);
        $detail->update([
            'idkode_tindakan_terapi' => $request->idkode_tindakan_terapi,
            'detail' => $request->detail
        ]);

        return redirect()->back()->with('success', 'Tindakan terapi berhasil diperbarui.');
    }

    public function destroyDetail($id)
    {
        $detail = Detail_rekam_medis::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Tindakan terapi berhasil dihapus.');
    }
}
