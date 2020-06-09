<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id("ID")->unsigned();
            $table->foreignId("ID_Role")->references('ID')->on('roles')->cascadeOnDelete();
            $table->string("Nom", 40);
            $table->string("Prenom", 40);
            $table->string('Entreprise', 100);
            $table->string("Mail", 100)->unique();
            $table->string("Telephone", 10);
            $table->string("MotDePasse", 60);
            $table->string("SIRET", 20)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
