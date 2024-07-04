<?php
// database/migrations/xxxx_xx_xx_create_product_images_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->string('nom_image', 255);
            $table->foreignId('produit_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
