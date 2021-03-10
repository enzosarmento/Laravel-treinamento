<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory('App\User')->create(
            [
                'name' => 'Enzo',
                'email' => 'enzosarmento91@gmail.com',
                'password' => bcrypt(123456),
                'remember_token' => Str::random(10),
            ]
        );

        $this->call('PostsTableSeeder');
        $this->call('TagTableSeeder');
    }
}
