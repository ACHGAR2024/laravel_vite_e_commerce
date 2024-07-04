<?php
// database/migrations/xxxx_xx_xx_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->text('description');
            $table->decimal('prix', 10, 2);
            $table->integer('stock');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
