<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
//        factory(\App\Article::class,10)->create();
       foreach(range(1,10) as $number){
          // Select a category
          $category = \Illuminate\Support\Facades\DB::table('categories')->inRandomOrder()->first();

          // insert into articles
          $id = \Illuminate\Support\Facades\DB::table('articles')->insertGetId([
             'title' => $faker->words(rand(1,10), true),
             'content' => $faker->realText(rand(200,300))
          ]);

          //link
          \Illuminate\Support\Facades\DB::table('article_category')->insert([
             'category_id' => $category->id,
             'article_id' => $id
          ]);
       }
    }
}
