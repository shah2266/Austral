<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'year_of_established'   =>'2000',
        'caption'               => $faker->name,
        'sub_title'             => 'Manufacturing Relationships Distributing Quality',
        'btn_label'             => 'View All Projects',
        'btn'                   => '#',
        'image'                 => $faker->imageUrl($width = 640, $height = 480),
        'status'                => '1'
    ];
});
