<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekam_medis extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = false;

    protected $fillable = [
        'idreservasi_dokter',
        'created_at',
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'dokter_pemeriksa',
    ];

    public function temuDokter()
    {
        return $this->belongsTo(Temu_dokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    public function dokterPemeriksa()
    {
        return $this->belongsTo(Role_user::class, 'dokter_pemeriksa', 'idrole_user');
    }

    public function detailRekamMedis()
    {
        return $this->hasMany(Detail_rekam_medis::class, 'idrekam_medis', 'idrekam_medis');
    }
}
