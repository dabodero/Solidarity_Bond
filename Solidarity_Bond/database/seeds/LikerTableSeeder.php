<?php

use Illuminate\Database\Seeder;

class LikerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Liker::class, 10)->create();
    }
}
