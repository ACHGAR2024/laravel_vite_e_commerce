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
    Schema::create('promos', function (Blueprint $table) {
        $table->id();
        $table->integer('reduction');
        $table->string('nom_promo', 50);
        $table->string('description', 255)->nullable();
        $table->date('date_debut');
        $table->date('date_fin');
        $table->string('image', 255)->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('promos');
}

};
