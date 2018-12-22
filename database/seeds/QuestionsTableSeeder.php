<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question_types = \App\Entities\QuestionType::all();
        factory(App\Entities\Question::class, 1000)->create()->each(function ($q) use ($question_types) {
            $q->questionTypes()->attach($question_types->random(rand(1, 4))->pluck('id')->toArray());
        });
    }
}
