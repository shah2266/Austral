<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        'address'               => $faker->address,
        'from_date'             => '2019-12-17 07:04:31',
        'to_date'               => '2019-12-17 07:04:31',
        'description'           => $faker->text,
        'original_image_path'   => '/frontendStyle/img/event/thumb/big/',
        'resize_image_path'     => '/frontendStyle/img/event/thumb/small/',
        'image'                 => $faker->imageUrl($width = 640, $height = 480),
        'status'                => '1'
    ];
});
