<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CredentialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credentials')->insert([
            'id'                    => 1,
            'phone'                 => '+998 (98) 366-76-70',
            'email'                 => 'info@heating_energy.uz',
            'facebook'              => 'facebook.com',
            'telegram'              => 'telegram.me',
            'instagram'             => 'instagram.com',
            'whatsapp'              => 'whatsapp.com',
        ]);

        DB::table('credential_translations')->insert([
            'id'                    => 1,
            'credential_id'        => 1,
            'locale'                => 'en',
            'company_name'          => 'Heating Energy',
            'company_address'       => 'Uzbekistan, Tashkent, Usta Shirin str., 125',
            'company_info_brief'    => 'Simple text',
            'company_info_full'     => 'Long long text',
            'anchor'                => 'anchor_en'
        ]);

        DB::table('credential_translations')->insert([
            'id'                    => 2,
            'credential_id'         => 1,
            'locale'                => 'ru',
            'company_name'          => 'Heating Energy',
            'company_address'       => 'Узбекистан, г.Ташкент, ул.Уста Ширин, 125',
            'company_info_brief'    => 'Короткий текст',
            'company_info_full'     => 'Длинный текст',
            'anchor'                => 'anchor_ru'
        ]);
    }
}
