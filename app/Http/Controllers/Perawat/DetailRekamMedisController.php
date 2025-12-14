<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekam_medis;

class DetailRekamMedisController extends Controller
{
    public function show($id)
    {
        $rekamMedis = Rekam_medis::with([
            'temuDokter.pet.pemilik.user',
            'dokterPemeriksa.user',
            'detailRekamMedis.tindakanTerapi'
        ])->findOrFail($id);

        return view('Roles.Perawat.Views.detail_rekam_medis', compact('rekamMedis'));
    }
}
