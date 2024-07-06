<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLike extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'type'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}