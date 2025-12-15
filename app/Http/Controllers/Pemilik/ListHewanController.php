<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListHewanController extends Controller
{
    public function index()
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
}
