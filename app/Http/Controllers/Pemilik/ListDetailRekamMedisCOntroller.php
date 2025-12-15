<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListDetailRekamMedisController extends Controller
{
    public function show($id)
    {
        $userId = Auth::id();
        $pemilik = DB::table('pemilik')->where('iduser', $userId)->first();
        
        if (!$pemilik) {
            abort(403, 'Unauthorized action.');
        }

        $rekamMedis = DB::table('rekam_medis')
            ->join('temu_dokter', 'rekam_medis.idreservasi_dokter', '=', 'temu_dokter.idreservasi_dokter')
            ->join('pet', 'temu_dokter.idpet', '=', 'pet.idpet')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            
            ->leftJoin('role_user as ru_pemeriksa', 'rekam_medis.dokter_pemeriksa', '=', 'ru_pemeriksa.idrole_user')
            ->leftJoin('User as u_pemeriksa', 'ru_pemeriksa.iduser', '=', 'u_pemeriksa.iduser')
            
            ->join('role_user as ru_reservasi', 'temu_dokter.idrole_user', '=', 'ru_reservasi.idrole_user')
            ->join('User as u_reservasi', 'ru_reservasi.iduser', '=', 'u_reservasi.iduser')

            ->where('rekam_medis.idrekam_medis', $id)
            ->where('pet.idpemilik', $pemilik->idpemilik)
            ->select(
                'rekam_medis.*',
                'pet.nama as nama_hewan',
                'pet.tanggal_lahir',
                'pet.gender',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan',
                'temu_dokter.tanggal as tanggal_periksa',
                'temu_dokter.keluhan',
                DB::raw('COALESCE(u_pemeriksa.nama, u_reservasi.nama) as nama_dokter')
            )
            ->first();

        if (!$rekamMedis) {
            return redirect()->route('pemilik.rekam_medis')->with('error', 'Rekam medis tidak ditemukan atau Anda tidak memiliki akses.');
        }
        $details = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->where('detail_rekam_medis.idrekam_medis', $id)
            ->select(
                'detail_rekam_medis.*',
                'kode_tindakan_terapi.nama_tindakan',
                'kode_tindakan_terapi.biaya' 
            )
            ->get();
        $details = DB::table('detail_rekam_medis')
            ->join('kode_tindakan_terapi', 'detail_rekam_medis.idkode_tindakan_terapi', '=', 'kode_tindakan_terapi.idkode_tindakan_terapi')
            ->where('detail_rekam_medis.idrekam_medis', $id)
            ->select('detail_rekam_medis.*', 'kode_tindakan_terapi.*')
            ->get();


        return view('Roles.Pemilik.Views.detail_rekam_medis', compact('rekamMedis', 'details'));
    }
}
