<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'                    => 1,
            'parent_id'             => 0
        ]);

        DB::table('category_translations')->insert([
            'id' => 1,
            'category_id' => 1,
            'locale' => 'en',
            'name' => 'Pipes',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 2,
            'category_id' => 1,
            'locale' => 'ru',
            'name' => 'Трубы',
            'anchor' => 'anchor_ru'
        ]);

        DB::table('categories')->insert([
            'id'                    => 2,
            'parent_id'             => 0
        ]);

        DB::table('category_translations')->insert([
            'id' => 3,
            'category_id' => 2,
            'locale' => 'en',
            'name' => 'Fitting',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 4,
            'category_id' => 2,
            'locale' => 'ru',
            'name' => 'Фитинги',
            'anchor' => 'anchor_ru'
        ]);
    }
}
