<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'nom_image', 'produit_id'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}

