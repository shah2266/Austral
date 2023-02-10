<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PageContent;
use Faker\Generator as Faker;

$factory->define(PageContent::class, function (Faker $faker) {
    return [
        'page_id'       => $faker->numberBetween(2,5),
        'heading'       => $faker->name,
        'description'   => $faker->text,
        'status'        => '1'
    ];
});
