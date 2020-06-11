<?php

use Illuminate\Database\Seeder;
use \App\Models\Utilisateur;

class UtilisateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Utilisateur::class, 10)->create();
    }
}
