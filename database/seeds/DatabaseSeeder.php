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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        if(env('APP_ENV') != 'production') {
            $this->call(QuestionTypesTableSeeder::class);
            $this->call(QuestionsTableSeeder::class);
        }
    }
}
