<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'idrole';
    public $timestamps = false;

    protected $fillable = [
        'nama_role',
    ];

    // role muncul banyak kali di role_user
    public function roleUsers()
    {
        return $this->hasMany(Role_User::class, 'idrole', 'idrole');
    }

    // role terhubung ke banyak user lewat role_user
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'idrole', 'iduser')
            ->withPivot('status', 'idrole_user');
    }
}
