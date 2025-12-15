<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    public function Dashboard_Pemilik()
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        $hewanCount = 0;
        $reservasiCount = 0;
        $rekamMedisCount = 0;

        if ($pemilik) {
            $hewanCount = DB::table('pet')
                ->where('idpemilik', $pemilik->idpemilik)
                ->count();
            $reservasiCount = DB::table('temu_dokter')
                ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->where('temu_dokter.status', 'Menunggu')
                ->count();
                
            $rekamMedisCount = DB::table('rekam_medis')
                ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
                ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->count();
        }

        return view('roles.pemilik.Dashboard_Pemilik', compact('hewanCount', 'reservasiCount', 'rekamMedisCount'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('Roles.Pemilik.Views.Profile', compact('user'));
    }
}
