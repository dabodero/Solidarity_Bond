<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(ProduitTableSeeder::class);
        $this->call(UtilisateurTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(CommandeTableSeeder::class);
        $this->call(ComposerTableSeeder::class);
        $this->call(CommentaireTableSeeder::class);
        $this->call(LikerTableSeeder::class);
    }
}
