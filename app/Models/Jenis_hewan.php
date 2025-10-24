<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis_hewan extends Model
{
    use HasFactory;

    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    public $timestamps = false;

    protected $fillable = [
        'nama_jenis_hewan',
    ];

    // Contoh: Jenis "Kucing" punya banyak ras (Persia, Maine Coon, dst)
    public function rasHewans()
    {
        return $this->hasMany(RasHewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }
}
