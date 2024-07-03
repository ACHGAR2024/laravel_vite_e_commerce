<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('prenom', 100);
            $table->string('pseudo', 100)->nullable();
            $table->string('telephone', 15)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role', 20)->default('client');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedTinyInteger('role_id')->default(2)->comment('1: Administrateur, 2: Utilisateur');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
