<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use \App\Models\Api\Article;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 20;
        $users = User::all();
        $numberOfAuthor = $users->count();
        $tags = "cuoc song, kien thuc, su doi";
        $state = [ 'draft','published' ,'deleted'];
        $html_meta = '<meta charset=\"utf-8\">
            <title>Database: Seeding - Laravel - The PHP Framework For Web Artisans</title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
            <meta name=\"author\" content=\"Taylor Otwell\">
            <meta name=\"description\" content=\"Laravel - The PHP framework for web artisans.\">
            <meta name=\"keywords\" content=\"laravel, php, framework, web, artisans, taylor otwell\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">';

        for($i =0; $i < $limit; $i++){
            $title = $faker->text(80);
            Article::create([
                'title' => $title,
                'content'=> $faker->paragraph(20),
                'slug' => DatabaseSeeder::slugify($title),
                'author_id' => $faker->numberBetween(1,$numberOfAuthor),
                'tags' => $tags,
                'state' => $faker->randomElement($state),
                'image_url' => $faker->imageUrl($width = 640, $height = 480),
                'html_meta' => $html_meta
            ]);
        }
    }
}
