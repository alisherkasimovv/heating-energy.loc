<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'id'                    => 1,
            'url'                   => '/uploads/credentials/ooDM42kBIpIWKrY.jpeg',
            'image_type'            => 'App\Credential',
            'image_id'              => 1
        ]);
    }
}
