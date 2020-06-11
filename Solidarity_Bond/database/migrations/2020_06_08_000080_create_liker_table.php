<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liker', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->foreignId("ID_Utilisateur")->references("ID")->on("utilisateurs");
            $table->foreignId("ID_Commentaire")->references("ID")->on("commentaires");
            $table->primary(['ID_Utilisateur', 'ID_Commentaire']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liker');
    }
}
