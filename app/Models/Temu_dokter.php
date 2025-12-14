<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Temu_dokter extends Model
{
    use HasFactory;

    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    public $timestamps = false;

    protected $fillable = [
        'no_urut',
        'waktu_daftar',
        'status',
        'idpet',
        'idrole_user',
        'tanggal',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function dokter()
    {
        return $this->belongsTo(Role_user::class, 'idrole_user', 'idrole_user');
    }

    public function rekamMedis()
    {
        return $this->hasMany(Rekam_medis::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }
}
