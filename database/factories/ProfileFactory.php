<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
   return [
      'title' => 'Sumit Title',
      'description' => 'Sumit Description',
      'url' => 'hotmail.com',
      'user_id' => 1
   ];
});
