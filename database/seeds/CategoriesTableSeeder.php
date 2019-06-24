<?php

use Illuminate\Database\Seeder;
use App\Models\Api\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            'lap trinh',
            'doi song',
            'tin tuc',
            'du lich',
            'chuyen nghe dev',
            'game',
            'tuoi tre'
        ];
        foreach ($cats as $cat) {
            Category::create([
                'name' => $cat
            ]);
        }
    }
}
