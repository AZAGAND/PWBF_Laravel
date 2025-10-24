<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kode_tindakan_terapi extends Model
{
    use HasFactory;

    protected $table = 'kode_tindakan_terapi';
    protected $primaryKey = 'idkode_tindakan_terapi';
    public $timestamps = false;

    protected $fillable = [
        'kode',
        'deskripsi_tindakan_terapi',
        'idkategori',
        'idkategori_klinis',
    ];

    // kategori besar (Vaksinasi, Bedah, Rawat Inap, dll)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori', 'idkategori');
    }

    // kategori klinis (Terapi / Tindakan)
    public function kategoriKlinis()
    {
        return $this->belongsTo(KategoriKlinis::class, 'idkategori_klinis', 'idkategori_klinis');
    }

    // semua detail rekam medis yang pakai kode tindakan ini
    public function detailRekamMedis()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}
