<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekam_medis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = false; // tabel hanya punya created_at, ga ada updated_at -> matikan auto timestamps Laravel

    protected $fillable = [
        'idreservasi_dokter',
        'created_at',
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'dokter_pemeriksa',
    ];

    // rekam medis ini berasal dari reservasi temu_dokter mana
    public function temuDokter()
    {
        return $this->belongsTo(Temu_dokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    // siapa dokter pemeriksa (role_user record)
    public function dokterPemeriksa()
    {
        return $this->belongsTo(Role_user::class, 'dokter_pemeriksa', 'idrole_user');
    }

    // detail tindakan/terapi yg dilakukan dalam satu rekam_medis
    public function detailRekamMedis()
    {
        return $this->hasMany(Detail_rekam_medis::class, 'idrekam_medis', 'idrekam_medis');
    }
}
