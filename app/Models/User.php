<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'prenom', 'pseudo', 'telephone', 'email', 'password', 'role', 'role_id', 'image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'id_client');
    }
}