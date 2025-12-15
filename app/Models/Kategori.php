<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
    ];

    public function kodeTindakanTerapi()
    {
        return $this->hasMany(Kode_Tindakan_Terapi::class, 'idkategori', 'idkategori');
    }
}
