<?php

// app/Models/Avis.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentaire',
        'note',
        'id_products',
        'id_user',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_products');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}