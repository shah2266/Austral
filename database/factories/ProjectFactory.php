<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_type'          => $faker->numberBetween(1,3),
        'project_name'          => $faker->name,
        'address'               => $faker->address,
        'total_area'            => $faker->numberBetween(1200,1600),
        'number_of_unit'        => $faker->numberBetween(1,4),
        'flat'                  => $faker->numberBetween(1,12),
        'lift'                  => $faker->numberBetween(1,2),
        'parking_space'         => $faker->numberBetween(1,30),
        'features'              => $faker->title,
        'handover_date_time'    => '2019-12-17 07:04:31',
        'description'           => $faker->text,
        'original_image_path'   => '/frontendStyle/img/project/thumb/big/',
        'resize_image_path'     => '/frontendStyle/img/project/thumb/small/',
        'image'                 => $faker->imageUrl($width = 840, $height = 680),
        'status'                => '1'
    ];
});
