<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composer', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->foreignId("ID_Produit")->references("ID")->on("produits");
            $table->foreignId("ID_Commande")->references("ID")->on("commandes");
            $table->integer("Quantité");
            $table->primary(['ID_Produit', 'ID_Commande']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composer');
    }
}
