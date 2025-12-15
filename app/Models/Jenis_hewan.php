<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis_hewan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    public $timestamps = false;

    protected $fillable = [
        'nama_jenis_hewan',
    ];

    public function rasHewans()
    {
        return $this->hasMany(Ras_Hewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }
}
