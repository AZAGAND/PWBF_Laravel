<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'pemilik';
    protected $primaryKey = 'idpemilik';
    public $timestamps = false;

    protected $fillable = [
        'no_wa',
        'alamat',
        'iduser',
    ];

    // Pemilik ini sebenarnya user mana (akun login si pemilik hewan)
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }

    // Pemilik punya banyak hewan (pet)
    public function pets()
    {
        return $this->hasMany(Pet::class, 'idpemilik', 'idpemilik');
    }
}
