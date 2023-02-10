<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'page_name' => $faker->name,
        'title'     => $faker->title,
        'status'    => '1'
    ];
});
