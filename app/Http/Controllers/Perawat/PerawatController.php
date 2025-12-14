<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rekam_medis;
use App\Models\Temu_dokter;
use Illuminate\Support\Facades\Auth;

class PerawatController extends Controller
{
    public function Dashboard_Perawat () {
        return view('Roles.Perawat.Dashboard_Perawat');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('Roles.Perawat.Views.Profile', compact('user'));
    }

    public function rekamMedis()
    {
        $rekamMedis = Rekam_medis::with(['temuDokter.pet.pemilik.user', 'dokterPemeriksa.user'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        $reservasiList = Temu_dokter::with(['pet.pemilik.user', 'dokter.user'])
            ->where(function($q) {
                $q->where('status', 'Pending')
                  ->orWhere('status', 'Unknown')
                  ->orWhereNull('status');
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Roles.Perawat.Views.rekam_medis', compact('rekamMedis', 'reservasiList'));
    }

    public function storeRekamMedis(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required',
            'diagnosa' => 'required',
            'catatan' => 'required',
            'temuan_klinis' => 'required',
        ]);

        $reservasi = Temu_dokter::findOrFail($request->idreservasi_dokter);

        Rekam_medis::create([
            'idreservasi_dokter' => $request->idreservasi_dokter,
            'diagnosa' => $request->diagnosa,
            'anamnesa' => $request->catatan,
            'temuan_klinis' => $request->temuan_klinis,
            'dokter_pemeriksa' => $reservasi->idrole_user,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Rekam Medis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rekamMedis = Rekam_medis::findOrFail($id);
        return view('Roles.Perawat.Views.edit_rekam_medis', compact('rekamMedis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'diagnosa' => 'required',
            'anamnesa' => 'required', // Note: Input name is 'anamnesa' in model, 'catatan' in form maybe? let's stick to model
            'temuan_klinis' => 'required',
        ]);

        $rekamMedis = Rekam_medis::findOrFail($id);
        $rekamMedis->update([
            'diagnosa' => $request->diagnosa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
        ]);

        return redirect()->route('perawat.rekam_medis')->with('success', 'Rekam Medis berhasil diperbarui');
    }

    public function show($id)
    {
        $rekamMedis = Rekam_medis::with([
            'temuDokter.pet.pemilik.user',
            'dokterPemeriksa.user',
            'detailRekamMedis.tindakanTerapi'
        ])->findOrFail($id);

        return view('Roles.Perawat.Views.detail_rekam_medis', compact('rekamMedis'));
    }

    public function reservasi()
    {
        $reservasi = Temu_dokter::with(['pet', 'dokter.user'])
            ->orderBy('tanggal', 'desc')
            ->get();
            
        return view('Roles.Perawat.Views.reservasi', compact('reservasi'));
    }

    public function updateReservasi(Request $request, $id)
    {
        $reservasi = Temu_dokter::findOrFail($id);
        $reservasi->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui');
    }

    public function destroyReservasi($id)
    {
        $reservasi = Temu_dokter::findOrFail($id);
        $reservasi->delete();
        
        return redirect()->back()->with('success', 'Reservasi berhasil dihapus');
    }
}
