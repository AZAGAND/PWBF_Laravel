<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rekam_medis;
use App\Models\Role_user;
// use App\Models\Detail_rekam_medis;

class RekamMedisDokterController extends Controller
{
    public function index()
    {
        $dokterRoleUser = Role_user::where('iduser', Auth::id())
                                   ->where('idrole', 2)
                                   ->first();

        $rekamMedis = [];

        if ($dokterRoleUser) {
            $rekamMedis = Rekam_medis::with([
                'temuDokter.pet.pemilik.user', 
                'temuDokter.pet.rasHewan',
                'dokterPemeriksa.user' 
            ])
            ->orderBy('created_at', 'desc') 
            ->get();
        }

        return view('Roles.Dokter.Views.RekamMedis', compact('rekamMedis'));
    }

}
