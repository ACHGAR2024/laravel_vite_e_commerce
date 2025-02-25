<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('inclure', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_produit')->constrained('produits');
        $table->foreignId('id_promo')->constrained('promos');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('inclure');
}

};
