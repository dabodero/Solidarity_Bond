<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id("ID")->unsigned();
            $table->foreignId("ID_Utilisateur")->references("ID")->on("utilisateurs")->cascadeOnDelete();
            $table->foreignId("ID_Produit")->references("ID")->on("produits")->cascadeOnDelete();
            $table->string("Commentaire", 500);
            $table->date("Date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}
