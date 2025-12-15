<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListRekamMedisController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        $rekamMedis = collect([]);
        
        if ($pemilik) {
            $rekamMedis = DB::table('rekam_medis')
                ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
                ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
                
                ->leftJoin('role_user as ru_pemeriksa', 'rekam_medis.dokter_pemeriksa', '=', 'ru_pemeriksa.idrole_user')
                ->leftJoin('User as u_pemeriksa', 'ru_pemeriksa.iduser', '=', 'u_pemeriksa.iduser')
                
                ->join('role_user as ru_reservasi', 'temu_dokter.idrole_user', '=', 'ru_reservasi.idrole_user')
                ->join('User as u_reservasi', 'ru_reservasi.iduser', '=', 'u_reservasi.iduser')
                
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select(
                    'rekam_medis.*',
                    'pet.nama as nama_hewan',
                    'temu_dokter.tanggal',
                    DB::raw('COALESCE(u_pemeriksa.nama, u_reservasi.nama) as nama_dokter')
                )
                ->orderBy('rekam_medis.created_at', 'desc')
                ->get();
        }
        
        return view('Roles.Pemilik.Views.rekam_medis', compact('rekamMedis'));
    }
}
