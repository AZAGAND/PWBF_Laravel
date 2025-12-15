<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kode_tindakan_terapi extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'idkode_tindakan_terapi';
    public $timestamps = false;

    protected $fillable = [
        'kode',
        'deskripsi_tindakan_terapi',
        'idkategori',
        'idkategori_klinis',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori', 'idkategori');
    }

    public function kategoriKlinis()
    {
        return $this->belongsTo(Kategori_Klinis::class, 'idkategori_klinis', 'idkategori_klinis');
    }

    public function detailRekamMedis()
    {
        return $this->hasMany(Detail_Rekam_Medis::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
    }
}
