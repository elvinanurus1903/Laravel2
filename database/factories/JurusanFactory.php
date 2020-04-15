<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jurusan;
use Faker\Generator as Faker;

$factory->define(Jurusan::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
         'fakultas_id' => $faker->numberBetween(1,10) 
    ];
});
