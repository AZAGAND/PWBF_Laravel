<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $table = 'User';
    protected $primaryKey = 'iduser';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    public function roleUsers()
    {
        return $this->hasMany(Role_User::class, 'iduser', 'iduser');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'iduser', 'idrole')
            ->withPivot('status', 'idrole_user');
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }
}
