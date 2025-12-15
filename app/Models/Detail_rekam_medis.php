<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail_rekam_medis extends Model
{
    use HasFactory;

    protected $table = 'detail_rekam_medis';
    protected $primaryKey = 'iddetail_rekam_medis';
    public $timestamps = false;

    protected $fillable = [
        'idrekam_medis',
        'idkode_tindakan_terapi',
        'detail',
    ];

    public function rekamMedis()
    {
        return $this->belongsTo(Rekam_medis::class, 'idrekam_medis', 'idrekam_medis');
    }

    public function tindakanTerapi()
    {
        return $this->belongsTo(Kode_tindakan_terapi::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}
