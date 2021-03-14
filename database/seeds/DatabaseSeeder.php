<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call('PostsTableSeeder');
        $this->call('TagTableSeeder');
    }
}
