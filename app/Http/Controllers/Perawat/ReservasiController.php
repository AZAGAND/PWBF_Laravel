<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temu_dokter;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Temu_dokter::with(['pet', 'dokter.user'])
            ->orderBy('tanggal', 'desc')
            ->get();
            
        return view('Roles.Perawat.Views.reservasi', compact('reservasi'));
    }

    public function update(Request $request, $id)
    {
        $reservasi = Temu_dokter::findOrFail($id);
        $reservasi->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $reservasi = Temu_dokter::findOrFail($id);
        $reservasi->delete();
        
        return redirect()->back()->with('success', 'Reservasi berhasil dihapus');
    }
}
