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
            'name' => 'PPR pipes and fittings',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 2,
            'category_id' => 1,
            'locale' => 'ru',
            'name' => 'ППР трубы и фитинги',
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
            'name' => 'Heating boilers',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 4,
            'category_id' => 2,
            'locale' => 'ru',
            'name' => 'Отопительные котлы',
            'anchor' => 'anchor_ru'
        ]);

        DB::table('categories')->insert([
            'id'                    => 3,
            'parent_id'             => 0
        ]);

        DB::table('category_translations')->insert([
            'id' => 5,
            'category_id' => 3,
            'locale' => 'en',
            'name' => 'Radiators (Panel, Aluminum, etc.)',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 6,
            'category_id' => 3,
            'locale' => 'ru',
            'name' => 'Радиаторы (Панельные, Алюминиевые и др)',
            'anchor' => 'anchor_ru'
        ]);

        DB::table('categories')->insert([
            'id'                    => 4,
            'parent_id'             => 0
        ]);

        DB::table('category_translations')->insert([
            'id' => 7,
            'category_id' => 4,
            'locale' => 'en',
            'name' => 'Pumps (to increase water pressure, etc.)',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 8,
            'category_id' => 4,
            'locale' => 'ru',
            'name' => 'Насосы (для повышения давления воды и др)',
            'anchor' => 'anchor_ru'
        ]);

        DB::table('categories')->insert([
            'id'                    => 5,
            'parent_id'             => 0
        ]);

        DB::table('category_translations')->insert([
            'id' => 9,
            'category_id' => 5,
            'locale' => 'en',
            'name' => 'Pumps (to increase water pressure, etc.)',
            'anchor' => 'anchor_en'
        ]);

        DB::table('category_translations')->insert([
            'id' => 10,
            'category_id' => 5,
            'locale' => 'ru',
            'name' => 'Насосы (для повышения давления воды и др)',
            'anchor' => 'anchor_ru'
        ]);
    }
}
