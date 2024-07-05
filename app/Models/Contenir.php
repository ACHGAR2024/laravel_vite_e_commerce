<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenir extends Model
{
    use HasFactory;

    protected $table = 'contenir';
    protected $fillable = ['id_commande', 'id_produit', 'quantite', 'prix'];
}
