<?php

use Illuminate\Database\Seeder;

class ComposerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Composer::class, 8);
    }
}
