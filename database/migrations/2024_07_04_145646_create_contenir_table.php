<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenirTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('contenir', function (Blueprint $table) {
        $table->foreignId('id_commande')->constrained('commandes');
        $table->foreignId('id_produit')->constrained('produits');
        $table->decimal('quantite', 10, 2);
        $table->decimal('prix', 10, 2);
        $table->primary(['id_commande', 'id_produit']);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('contenir');
}

};
