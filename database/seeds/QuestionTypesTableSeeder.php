<?php

use Illuminate\Database\Seeder;

/**
 * Class QuestionTypesTableSeeder
 */
class QuestionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\QuestionType::class, 10)->create();
    }
}
