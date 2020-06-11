<?php

use Illuminate\Database\Seeder;

class CommentaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Commentaire::class, 20)->create();
    }
}
