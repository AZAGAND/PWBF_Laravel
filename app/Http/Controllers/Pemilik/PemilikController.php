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
            
            // Note: table is 'temu_dokter', status col is 'status'
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

    public function daftarHewan()
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        $pets = collect([]);

        if ($pemilik) {
            $pets = DB::table('pet')
                ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
                ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select(
                    'pet.*', 
                    'ras_hewan.nama_ras', 
                    'jenis_hewan.nama_jenis_hewan'
                )
                ->get();
        }
        
        return view('Roles.Pemilik.Views.daftar_hewan', compact('pets'));
    }

    public function daftarReservasi()
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        $reservasi = collect([]);
        
        if ($pemilik) {
            // table 'temu_dokter' links to doctor via 'idrole_user' which is in 'role_user' table
            $reservasi = DB::table('temu_dokter')
                ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
                ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
                ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
                ->join('role_user', 'temu_dokter.idrole_user', '=', 'role_user.idrole_user')
                ->join('User', 'role_user.iduser', '=', 'User.iduser')
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select(
                    'temu_dokter.*',
                    'temu_dokter.idreservasi_dokter', // ensure ID is available
                    'pet.nama as nama_hewan',
                    'jenis_hewan.nama_jenis_hewan',
                    'User.nama as nama_dokter'
                )
                ->orderBy('temu_dokter.tanggal', 'desc')
                ->get();
        }
        
        return view('Roles.Pemilik.Views.daftar_reservasi', compact('reservasi'));
    }

    public function rekamMedis()
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        $rekamMedis = collect([]);
        
        if ($pemilik) {
            // rekam_medis 'dokter_pemeriksa' -> role_user.idrole_user
            // temu_dokter 'idrole_user' -> role_user.idrole_user (doctor assigned)
            $rekamMedis = DB::table('rekam_medis')
                ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
                ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
                
                // Join for Pemeirksa (from rekam_medis)
                ->leftJoin('role_user as ru_pemeriksa', 'rekam_medis.dokter_pemeriksa', '=', 'ru_pemeriksa.idrole_user')
                ->leftJoin('User as u_pemeriksa', 'ru_pemeriksa.iduser', '=', 'u_pemeriksa.iduser')
                
                // Join for Reservasi Doctor (from temu_dokter)
                ->join('role_user as ru_reservasi', 'temu_dokter.idrole_user', '=', 'ru_reservasi.idrole_user')
                ->join('User as u_reservasi', 'ru_reservasi.iduser', '=', 'u_reservasi.iduser')
                
                ->where('pet.idpemilik', $pemilik->idpemilik)
                ->select(
                    'rekam_medis.*',
                    'pet.nama as nama_hewan',
                    'temu_dokter.tanggal',
                    // Use 'u_pemeriksa.nama' if available (actual doctor who did checkup), else assigned doctor
                    DB::raw('COALESCE(u_pemeriksa.nama, u_reservasi.nama) as nama_dokter')
                )
                ->orderBy('rekam_medis.created_at', 'desc')
                ->get();
        }
        
        return view('Roles.Pemilik.Views.rekam_medis', compact('rekamMedis'));
    }
}
