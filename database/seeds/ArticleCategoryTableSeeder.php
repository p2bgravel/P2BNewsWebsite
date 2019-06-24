<?php

use Illuminate\Database\Seeder;
use \App\Models\Api\Article;
use \App\Models\Api\Category;
use Faker\Factory as Faker;
use \Illuminate\Support\Facades\DB;
class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::all();
        $articles->each(function ($article) {
            $faker = Faker::create();
            // categories length
            $numberOfCategory = Category::all()->count();
            $repeater = $faker->numberBetween(1, $numberOfCategory);
            $l = [];
            for ($i = 0; $i < $repeater; $i++) {
                $rdCategoriesId = $faker->numberBetween(1, $numberOfCategory);
                $l[$rdCategoriesId] = $article->id;
            }
            foreach ($l as $rdCategoriesId => $articleId)
                DB::table('article_category')->insert([
                    'category_id' => $rdCategoriesId,
                    'article_id' => $articleId
                ]);

        });
    }
}
