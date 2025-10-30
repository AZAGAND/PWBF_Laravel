<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role_user extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $primaryKey = 'idrole_user';
    public $timestamps = false;

    protected $fillable = [
        'iduser',
        'idrole',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    public function temuDokter()
    {
        return $this->hasMany(Temu_Dokter::class, 'idrole_user', 'idrole_user');
    }

    // rekam medis yang diperiksa oleh dokter_pemeriksa (foreign key dokter_pemeriksa -> role_user)
    public function rekamMedisDiperiksa()
    {
        return $this->hasMany(Rekam_Medis::class, 'dokter_pemeriksa', 'idrole_user');
    }
}
