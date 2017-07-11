<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function(Faker\Generator $faker) {
	return [
		'platform' => \App\Post::PLATFORM_FACEBOOK,
		'content' => $faker->sentences(random_int(3, 6), true),
		'publish_at' => $faker->dateTimeBetween(
			\Carbon\Carbon::now()->addDay(), \Carbon\Carbon::now()->addWeek()
		),
		'user_id' => factory(App\User::class)->lazy()
	];
});

$factory->define(App\Tag::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->word,
		'post_id' => factory(App\Post::class)->lazy()
	];
});
