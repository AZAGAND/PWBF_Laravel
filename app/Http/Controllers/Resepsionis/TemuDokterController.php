<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Role_user;
use App\Models\Temu_dokter;

class TemuDokterController extends Controller
{
    public function index()
    {
        $pemiliks = Pemilik::with(['user', 'pets'])->get(); 
        $dokters = Role_user::where('idrole', 2)->with('user')->get(); 
        
        $temuDokter = Temu_dokter::with(['pet.pemilik.user', 'dokter.user', 'pet.rasHewan.jenisHewan'])
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Roles.Resepsionis.Views.temu_dokter', compact('pemiliks', 'dokters', 'temuDokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required|exists:pet,idpet',
            'idrole_user' => 'required|exists:role_user,idrole_user', 
        ]);

        $today = now('Asia/Jakarta');
        $datePrefix = $today->format('dmy'); 
        
        $queueCount = Temu_dokter::whereDate('tanggal', $today->toDateString())->count();
        $nextQueue = $queueCount + 1;
        
        $noUrut = $datePrefix . $nextQueue;

        Temu_dokter::create([
            'no_urut' => $noUrut,
            'waktu_daftar' => now('Asia/Jakarta'), 
            'tanggal' => now('Asia/Jakarta'), 
            'status' => 'P', 
            'idpet' => $request->idpet,
            'idrole_user' => $request->idrole_user,
        ]);

        return redirect()->back()->with('success', 'Jadwal temu berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $item = Temu_dokter::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Jadwal temu berhasil dihapus');
    }
}
