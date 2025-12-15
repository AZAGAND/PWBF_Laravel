<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListReservasiController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        $reservasi = collect([]);
        
        if ($pemilik) {
            $reservasi = DB::table('temu_dokter')
                ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
                ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
                ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
                ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
                ->join('User', 'role_user.iduser', '=', 'User.iduser')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select(
                    'temu_dokter.*',
                    'temu_dokter.idreservasi_dokter',
                    'pet.nama as nama_hewan',
                    'jenis_hewan.nama_jenis_hewan',
                    'User.nama as nama_dokter'
                )
                ->orderBy('temu_dokter.tanggal', 'desc')
                ->get();
        }
        
        return view('Roles.Pemilik.Views.daftar_reservasi', compact('reservasi'));
    }
}
