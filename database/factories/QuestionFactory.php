<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Entities\Question::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraphs(3, true),
        'level' => $faker->numberBetween(0, 4),
        'question_type_id' => $faker->numberBetween(1, 10),
        'answers' =>[
            ['content' => $faker->realText(50), 'is_correct' => true],
            ['content' => $faker->realText(50), 'is_correct' => false],
            ['content' => $faker->realText(50), 'is_correct' => false],
            ['content' => $faker->realText(50), 'is_correct' => false],
        ]
    ];
});
