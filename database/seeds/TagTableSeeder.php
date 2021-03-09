<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Tag::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Tag::class, 10)->create();
    }
}
