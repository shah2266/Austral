<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
       'icon'       => 'far fa-building',
       'heading'    => $faker->realText(rand(10,20)),
       'description'=> $faker->text,
       'status'     => '1',
    ];
});
