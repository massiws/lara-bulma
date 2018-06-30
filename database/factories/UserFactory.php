<?php

use Faker\Generator as Faker;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'role_id' => env('DEFAULT_ROLE', 2),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'avatar' => $faker->file(
            $sourceDir = 'resources/images',
            $targetDir = 'public/' . env('AVATAR_FOLDER'),
            false
        ),
        'remember_token' => str_random(10),
    ];
});
