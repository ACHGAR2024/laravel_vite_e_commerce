<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'reduction', 'nom_promo', 'description', 'date_debut', 'date_fin', 'image'
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'inclure', 'id_promo', 'id_produit');
    }
}
