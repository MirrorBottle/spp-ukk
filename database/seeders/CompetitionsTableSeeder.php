<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'name' => "Rekayasa Perangkat Lunak",
            ],
            [
                'name' => "Multimedia"
            ],
            [
                'name' => "Teknik Komputer dan Jaringan"
            ],
        ]);
    }
}
