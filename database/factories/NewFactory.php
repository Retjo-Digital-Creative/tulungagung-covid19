<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Berita;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Str;

$factory->define(Berita::class, function (Faker $faker) {
	$randNum = rand(100, 200);
	$userId = Arr::pluck(App\User::all(), 'id');
	$categoryId = Arr::pluck(App\Category::all(), 'id');
    return [
        'title' => $faker->text($maxNbChars = 200),
        'slug' => Str::slug($faker->text($maxNbChars = 180)),
        'description' => $faker->text($maxNbChars = 300),
        'image' => '15858355765e85ee386a410.png',
        'content' => $faker->text($maxNbChars = 700),
        'user_id' => Arr::random($userId),
        'category_id' => Arr::random($categoryId),
        'published_at' => Carbon::now()
    ];
});
