<?php



namespace App\Models;


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'products'; // Spécifiez le nom de la table ici

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'categorie_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function images()
{
    return $this->hasMany(ProductImage::class, 'produit_id');
}

public function firstImage()
{
    return $this->hasOne(ProductImage::class, 'produit_id')->oldestOfMany();
}

public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'contenir', 'id_produit', 'id_commande')->withPivot('quantite', 'prix');
    }

}
