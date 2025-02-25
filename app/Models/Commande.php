<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes';

    protected $fillable = [
        'id_client', 'total', 'statut', 'id_adresse'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'contenir', 'id_commande', 'id_produit')->withPivot('quantite', 'prix');
    }

    public function adresse()
    {
        return $this->belongsTo(Adresse::class, 'id_adresse');
    }

}
