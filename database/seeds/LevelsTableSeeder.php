<?php

use App\Entities\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['name' => 'N1']);
        Level::create(['name' => 'N2']);
        Level::create(['name' => 'N3']);
        Level::create(['name' => 'N4']);
        Level::create(['name' => 'N5']);
        Level::create(['name' => 'Others']);
    }
}
