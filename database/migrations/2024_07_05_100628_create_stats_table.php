<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('stats', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('icon');
        $table->integer('value');
        $table->timestamps();
    });
}


     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
};
