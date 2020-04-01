<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Berita;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Carbon\Carbon;

$factory->define(Berita::class, function (Faker $faker) {
	$randNum = rand(100, 200);
	$userId = Arr::pluck(App\User::all(), 'id');
	$categoryId = Arr::pluck(App\Category::all(), 'id');
    return [
        'title' => $faker->text($maxNbChars = 200),
        'description' => $faker->text($maxNbChars = 300),
        'image' => 'https://picsum.photos/' . $randNum,
        'content' => $faker->text($maxNbChars = 700),
        'user_id' => Arr::random($userId),
        'category_id' => Arr::random($categoryId),
        'published_at' => Carbon::now()
    ];
});
