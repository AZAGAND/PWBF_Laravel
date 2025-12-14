<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekam_medis;

class EditRekamMedisController extends Controller
{
    public function edit($id)
    {
        $rekamMedis = Rekam_medis::findOrFail($id);
        return view('Roles.Perawat.Views.edit_rekam_medis', compact('rekamMedis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'diagnosa' => 'required',
            'anamnesa' => 'required', 
            'temuan_klinis' => 'required',
        ]);

        $rekamMedis = Rekam_medis::findOrFail($id);
        $rekamMedis->update([
            'diagnosa' => $request->diagnosa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
        ]);

        return redirect()->route('perawat.rekam_medis')->with('success', 'Rekam Medis berhasil diperbarui');
    }
}
