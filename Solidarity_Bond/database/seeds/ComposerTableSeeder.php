<?php

use Illuminate\Database\Seeder;

class ComposerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $faker = Faker\Factory::create();

        factory(\App\Models\Composer::class, 20)->make()->each(function($composer) use ($faker){
            static $autoIncrementProduit = 1;

            $limit = $faker->numberBetween(0,3);
            $tour=0;
            while($tour<$limit){
                $composer->setAttribute('ID_Produit', $autoIncrementProduit++);
                $composer->setAttribute('Quantite', $faker->numberBetween(1,20));
                $composerSave = clone $composer;
                $composerSave->save();
                $tour++;
            }
            $autoIncrementProduit = 1;

        });
    }
}
