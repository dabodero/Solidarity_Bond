<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id("ID")->unsigned();
            $table->foreignId("ID_Utilisateur")->references("ID")->on("utilisateurs")->cascadeOnDelete();
            $table->date("Date");
            $table->boolean("Terminee");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
