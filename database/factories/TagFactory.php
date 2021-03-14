<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
