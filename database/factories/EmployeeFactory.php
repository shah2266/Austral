<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        'designation'           => 'Sr.Engineer',
        'id_card'               => $faker->numberBetween(1,2000),
        'email'                 => $faker->email,
        'contact'               => '1234567890',
        'address'               => $faker->address,
        'description'           => $faker->text,
        'gender'                => $faker->numberBetween(1,2),
        'original_image_path'   => '/frontendStyle/img/employee/thumb/big/',
        'resize_image_path'     => '/frontendStyle/img/employee/thumb/small/',
        'image'                 => $faker->imageUrl($width = 640, $height = 480),
        'status'                => '1'
    ];
});
