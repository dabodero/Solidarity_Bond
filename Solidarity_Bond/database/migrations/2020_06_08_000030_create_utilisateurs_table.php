<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id("ID")->unsigned();
            $table->foreignId("ID_Role")->references('ID')->on('roles')->cascadeOnDelete();
            $table->string("Nom", 40);
            $table->string("Prenom", 40);
            $table->string("Mail", 100)->unique();
            $table->string("MotDePasse", 60);
            $table->string('Entreprise', 100)->nullable();
            $table->string("Telephone", 10)->nullable();
            $table->string("SIRET", 20)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
