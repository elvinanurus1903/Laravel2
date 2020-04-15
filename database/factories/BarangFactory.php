<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'nama_barang' => $faker->word,
        'ruangan_id' => $faker->numberBetween(1,10),
        'total' => $faker->numberBetween(30,100),
        'broken' => $faker->numberBetween(30,100),
        'ruangan_id' => $faker->numberBetween(1,10),
        'created_by' => $faker->numberBetween(1,10),
        'updated_by' => $faker->numberBetween(1,10)
    ];
});

