<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekam_medis;
use App\Models\Temu_dokter;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = Rekam_medis::with(['temuDokter.pet.pemilik.user', 'dokterPemeriksa.user'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        $reservasiList = Temu_dokter::with(['pet.pemilik.user', 'dokter.user'])
            ->where(function($q) {
                $q->where('status', 'P') 
                  ->orWhere('status', 'Unknown')
                  ->orWhereNull('status');
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Roles.Perawat.Views.rekam_medis', compact('rekamMedis', 'reservasiList'));
    }

    public function store(Request $request)
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
}
