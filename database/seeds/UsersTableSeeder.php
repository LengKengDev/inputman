<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@inputman.local',
            'password' => bcrypt('123456')
        ]);

        $admin->assignRole('admin');

        if(env('APP_ENV') != 'production') {
            factory(User::class, 10)->create();
        }
    }
}
